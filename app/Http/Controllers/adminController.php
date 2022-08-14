<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
use App\Models\ApplicationPrograms;
use App\Models\ProgramAmount;
use App\Models\programs;
use App\Models\Transation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $total_applicant = applicant::all()->count();
        return view('admin.index',['total_applicant'=>$total_applicant]);
    }
    public function programs(){
        $programs = programs::all();
        return view('admin.programs',['programs'=>$programs]);
    }

    public function deleteProgram($id){
        // programs::find($id)->delete();
        // return redirect()->route('admin.programs')->with('success','Operation sucessfull..');

    }
    public function programsAmount(){
        $data = ProgramAmount::all();
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
        $user = User::where('Role','Admin')->get();
        $admin = admin::all();
        return view('admin.access_settings',['admin'=>$admin,'user'=>$user]);
    }

    public function createAdminUser(Request $request){
        //   $request->validate([
        //      'first_name'=>'required',
        //       'last_name'=>'required',
        //       'other_names'=>'required',
        //       'phone_number'=>'required',
        //       'email'=>'required' ,
        //      'phone_number'=>'required',
        //       'password'=>'required | confirmed',

        //   ]);

        DB::transaction( function() use ($request){
            User::create([
                'name'=>$request->first_name . ' '. $request->last_name . ' '. $request->other_names,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
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

       ProgramAmount::create([
            'programme'=>$request->programme,
            'entry_mode'=>$request->entry_mode,
            'amount'=>$request->amount
        ]);
        return redirect()->route('admin_program_amount')->with('Operation Successful..');

    }

    public function savePrograms(Request $request){
         $request->validate([
             'degree_awarded'=>'required',
             'course'=>'required',
             'department'=>'required',
             'faculty'=>'required',
        //     'status'=>'required',
             'duration'=>'required',
        //     'affliation'=>'required',
         ]);

        ApplicationPrograms::create([
            'degree_awarded'=>$request->degree_awarded,
            'course'=>$request->course,
            'department'=>$request->department,
            'faculty'=>$request->faculty,
            'duration'=>$request->duration,
        ]);

        return redirect()->route('admin_program_')->with('success','Operation Sucessful');
        
    }

    public function transaction(){
        $transaction = Transation::all();

        return view('admin.transaction',['transaction'=> $transaction]);
    }

    public function updateAdmin($id){
        $id = Auth::id();
        $user =  User::where('id',$id);
        $user->update([
            'Role'=>'SuperAdmin'
        ]);
    }

    public function settings(){
        return view('settings');
    }

    public function updatePassword(Request $request, $id){
        $user = Auth::user();
        $old_password = $user->password;
        $new_password = $request->password;  
        
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required |min:8',
            'confirm_password'=>'requird |confirmed' ,
        ]);
            
        // if(Auth::check($old_password,$new_password) ){
        //     User::find(auth()->user())->update(['password'=> Hash::make($request->new_password)]);
        // }
        
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
}

}
