<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
use App\Models\progamount;
use App\Models\programs;


class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.index');
    }
    public function programs(){
        return view('admin.programs');
    }
    public function programsAmount(){
        $data = progamount::all();
        return view('admin.programs_amount',['data' => $data]);
    }
    public function transactions(){
        return view('admin.transaction');
    }
    public function showLogout(){
        return view('admin.logout');
    }
    public function showApplicants(){
        $applicant = applicant::all();
        return view('admin.applicants',['applicant'=>$applicant]);
    }

    public function accessSettings(){
        $admin = admin::all();
        return view('admin.access_settings',['admin'=>$admin]);
    }

    public function createAdminUser(Request $request){
         $request->validate([
             'first_name'=>'required',
             'last_name'=>'required',
             'other_names'=>'required',
             'phone_number'=>'required',
             'email'=>'required | unique',
             'phone_number'=>'required',
             'password'=>'required | confirmed |min:6',

         ]);

        DB::transaction( function() use ($request){
            User::create([
                'name'=>$request->first_name . ' '. $request->last_name . ' '. $request->other_names,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>'Admin',
            ]);

            admin::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'other_names'=>$request->other_names,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
            ]);
            return redirect()->route('admin_access_settings_')->with('succses','Operation Succesfull..');
    
        });


    }

    public function deleteAdminUser($id){
        $admin = admin::find($id)->delete();
        return redirect()->route('admin_access_settings_')->with('success','Operation Succesfull..');
    }

    public function cancel(){
        return back();
    }

    public function savePaymentAmount(Request $request){
        $request->validate([
            'programme'=>'required',
            'entry_mode'=>'required',
            'amount'=>'required'
        ]);

        progamount::create([
            'programme'=>$request->programme,
            'entry_mode'=>$request->entry_mode,
            'amount'=>$request->amount
        ]);
        return redirect()->route('admin_program_amount')->with('Operation Successful..');

    }

    public function savePrograms(Request $request){
        // $request->validate([
        //     'degree_awarded'=>'required',
        //     'course'=>'required',
        //     'department'=>'required',
        //     'faculty'=>'required',
        //     'status'=>'required',
        //     'duration'=>'required',
        //     'affliation'=>'required',
        // ]);

        programs::create([
            'degree_awarded'=>$request->degree_awarded,
            'course'=>$request->course,
            'department'=>$request->department,
            'faculty'=>$request->faculty,
            'status'=>$request->status,
            'duration'=>$request->duration,
            'status'=>'Opened',
        ]);

        return redirect()->route('admin_program_')->with('success','Operation Sucessful');
        
    }
}
