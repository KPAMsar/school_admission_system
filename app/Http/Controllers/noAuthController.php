<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biodata;
use Jajo\NG;
use App\Models\applicant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AcademicSession;

class noAuthController extends Controller
{
    public function index(){
        $session = AcademicSession::where('status','Active')->get();

        return view('applicants.application_start',['session'=>$session]);
    }

    public function saveApplicant(Request $request){
        $request->validate([
            'mode_of_entry' => 'required',
            'session' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);
    DB::transaction(function() use($request){
        $applicant = Applicant::create([
            'programme' => 'DEGREE',
            'mode_of_entry' => $request['mode_of_entry'],
            'session' => $request['session'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'other_names' => $request['other_names'],
            'phone' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status' => 'School'
        ]);

       $user = User::Create([
                'name'=> $request['first_name']. $request['last_name']. $request['other_names'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
        ]);

        $code = $applicant->id < 1000 ? str_repeat("0", (4 - strlen("$applicant->id"))) . $applicant->id : $applicant->id;
        $application_number = getenv('SCHOOL_SHORT_CODE') . '-' . date('y') . '-' . $code;

        //update table with application number
        $applicant->update([
            'application_number' => $application_number
        ]);


        $user->update([
            'application_number' => $application_number
        ]);


        Session::put('application_number', $application_number);
        

    });

        
        //create the application number
       

        //save application number in session
       

         return redirect()->route('applicant_application_Start_success')->with('success','Operation Succesful.. ');
    }

    public function showSuccessOnStart(){
        $code = Session::get('application_number');

       
        $applicant = applicant::where('application_number', $code)->first();


        $applicant_number = Session::get('application_number');
        $applicant = applicant::where('application_number',$applicant_number)->first();
        return view('application_success', ['applicant'=>$applicant]);
    }
}
