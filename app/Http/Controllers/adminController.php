<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
use App\Models\ApplicationPrograms;
use App\Models\ApplicationSubjects;
use App\Models\ProgramAmount;
use App\Models\programs;
use App\Models\Transation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AcademicSession;
use App\Models\Payment;


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

    public function deleteProgram(Request $request){
         programs::where('id',$request->programs_delete)->delete();
         return back()->with('success','Operation sucessfull..');

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
            $request->validate([
               'first_name' =>'required',
                'last_name' =>'required',
                'other_names'=>'required',
                'phone_number'=>'required',
                'email'=>     'required' ,
               'phone_number'=>'required',
               'password' => 'required|confirmed',

            ]);

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

        });
        return back()->with('succses','Operation Succesfull..');


    }

    public function deleteAdminUser(Request $request){
        $admin = admin::where('id',$request->access_delete_id)->delete();
        return back()->with('success','Operation Succesfull..');
    }

    public function cancel(){
        return back();
    }

    public function programsAmount(){
        $data = ProgramAmount::all();
        return view('admin.programs_amount',['data' => $data]);
    }

    public function saveProgramAmount(Request $request){
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
        return back()->with('Operation Successful..');

    }

    public function deleteProgramAmount(Request $request){
        $programAmount = ProgramAmount::where('id',$request->programs_amount_delete)->delete();
        return back()->with('sucess','Operation Successful..');
    }

    public function updateProgramAmount(Request $request){
        $request->validate([
            'programme'=>'required',
            'entry_mode'=>'required',
            'amount'=>'required'
        ]);

        $programAmount = ProgramAmount::where('id',$request->programme_amount_id)->update([
            'programme'=>$request->programme,
            'entry_mode'=>$request->entry_mode,
            'amount'=>$request->amount
        ]);


        return back()->with('success','Operation Successfull..');
    }

    public function updateSession(Request $request){
        $request->validate([
            'session'=> 'required',
          ]);

      $session = AcademicSession::where('id',$request->session_id)->update([
        'session' => $request->session,
      ]);
      return back()->with('success','Operation successful.');

    }
    public function deleteSession(Request $request){
      AcademicSession::where('id',$request->session_delete_id)->delete();
      return back()->with('success','Operation Successful..');
    }

    public function saveSession(Request $request){
      $request->validate([
        'session'=> 'required',
      ]);
      AcademicSession::create([
        'session'=>$request->session,
      ]);
      return back()->with('success','Operation successful.');
    }

    public function showSession(){
        $session = AcademicSession::all();
        return view('admin.academic_session',['session'=> $session]);
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

    public function updateProgram(Request $request){
        $request->validate([
            'degree_awarded'=>'required',
            'course'=>'required',
            'department'=>'required',
            'faculty'=>'required',
       //     'status'=>'required',
            'duration'=>'required',
       //     'affliation'=>'required',
        ]);
       ApplicationPrograms::where('id',$request->programme_id)->update([

           'degree_awarded'=>$request->degree_awarded,
           'course'=>$request->course,
           'department'=>$request->department,
           'faculty'=>$request->faculty,
           'duration'=>$request->duration,
       ]);

       return back()->with('success','Operation Sucessful');
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

public function showSubjects(){
    $subjects = ApplicationSubjects::all();
    return view('admin.subjects',['subjects'=>$subjects]);
}
public function saveSubjects(Request $request){
    $request->validate([
        'subject'=>'required',
        'status'=>'required'
       ]);

    ApplicationSubjects::create([
        'name'=>$request->subject,
        'status'=>$request->status
    ]);
    return back()->with('success','Operation Successful..');

}

public function deleteSubject(Request $request){
    $subject = ApplicationSubjects::where('id',$request->subjects_delete)->delete();
    return back()->with('success','Operation Succesful');
}

public function updateSubjects(Request $request){

     $request->validate([
          'subject'=>'required',
          'status'=>'required'
         ]);
         
    $subject = ApplicationSubjects::where('id',$request->subject_id)->update([
        'name'=>$request->subject,
        'status'=>$request->status
    ]);
    return back()->with('success','Operation Succesful');
}
}
