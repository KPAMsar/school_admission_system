<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\admin;


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
        return view('admin.programs_amount');
    }
    public function transactions(){
        return view('admin.transaction');
    }
    public function showLogout(){
        return view('admin.logout');
    }
    public function showApplicants(){
        $applicant = applicant::all();
        return view('admin.applicants',['applicant']);
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
        $admin = admin::finf($id)->delete();
        return redirect()->route('admin_access_settings_')->with('success','Operation Succesfull..');
    }

    public function cancel(){
        return back();
    }
}
