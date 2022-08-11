<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biodata;
use Jajo\NG;
use App\Models\applicant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class applicantController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private function verifyLogin()
    {
        if (Session::get('application_number') != null && Session::get('logged_in') != null) {
            //verify that user is applying for degree
            $applicant = Applicant::where('application_number', Session::get('application_number'))->first();

            if ($applicant != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function index()
    {
        return view('applicants.index');
    }

    public function bioData()
    {

        // $applicant = applicant::where('application_number', Session::get('application_number'))->first();
        //  return view('applicants.bio_data',['states'=>$name, 'applicant'=>$applicant]);



        //first verify if use is logged in
        if (!$this->verifyLogin()) {
            $applicant = Applicant::where('application_number', Session::get('application_number'))->first();

            $ng = new NG();
            $states = $ng->states;
            return view('applicants.bio_data', ['pageName' => 'Bio-Data', 'applicant' => $applicant, 'states' => $states]);
        } else {
            //redirect to the login page
            return redirect('login');
        }
    }

    public function sendApplicantState(Request $request)
    {
        $sendData = $request->all();
        $ng = new NG();
        $lga = $ng->getLGA($sendData['state']);
        return response()->json(array($lga), 200);
    }

    public function saveBioData(Request $request)
    {
        $request->validate([
            'address_1' => 'required',
            'city_1' => 'required',
            ' address_2' => 'required',
            'city_2' => 'required',
            'country_of_residence' => 'required',
            'state_of_residence' => 'required',
            'lga_of_residence' => 'required',
            'country_of_origin' => 'required',
            'state_of_origin' => 'required',
            'lga_of_origin' => 'required',
            'dob_day ' => 'required',
            'dob_month ' => 'required',
            'dob_year ' => 'required',
            'nok_first_name' => 'required',
            'nok_last_name ' => 'required',
            'nok_address' => 'required',
            'nok_city' => 'required',
            'nok_country_of_residence ' => 'required',
            'nok_state_of_residence' => 'required',
            'nok_lga_of_residence' => 'required',
            'nok_phone_number' => 'required',
            'nok_email' => 'required |email',
            'application_number' => 'required',
        ]);

        biodata::create([
            'application_number' => Session::get('application_number'),
            'address_1' => $request['address_1'],
            'city_1 ' => $request['city_1'],
            ' address_2' => $request['address_2'],
            'city_2' => $request['city_2'],
            'country_of_residence' => $request['country_of_residence'],
            'country_of_residence' => $request['country_of_residence'],
            'lga_of_residence' => $request['lga_of_residence'],
            'country_of_origin' => $request['country_of_origin'],
            'state_of_origin' => $request['state_of_origin'],
            'lga_of_origin' => $request['lga_of_origin'],
            'dob_day' => $request['dob_day'],
            'dob_month' => $request['dob_month'],
            'dob_year' => $request['dob_year'],
            'nok_first_name' => $request['nok_first_name'],
            'nok_last_name' => $request['nok_last_name'],
            'nok_address' => $request['nok_address'],
            'nok_city' => $request['nok_city'],
            'nok_country_of_residence' => $request['nok_country_of_residence'],
            'nok_state_of_residence' => $request['nok_state_of_residence'],
            'nok_lga_of_residence' => $request['nok_lga_of_residence'],
            'nok_phone_number' => $request['nok_phone_number'],
            'nok_email' => $request['nok_email'],
        ]);

        return redirect()->route('')->with('success', 'Operation Succesful..');
    }

    public function applicationPage()
    {
        return view('applicants.Degree.application');
    }

    public function nceapplicationPage()
    {
        return view('applicants.nce.application');
    }
    // public function applicationStart(){
    //     return view('applicants.application_start');
    // }

    // public function saveApplicant(Request $request){
    //     //  $request->validate([
    //     //      'mode_of_entry'=>'required',
    //     //      'session'=>'required',
    //     //      'first_name'=>'required',
    //     //      'last_name'=>'required',
    //     //      'other_names'=>'required',
    //     //      'phone'=>'required',
    //     //  ]);
    //         $applicant = applicant::create([
    //         'programme'=>'DEGREE',
    //         'mode_of_entry'=>$request['mode_of_entry'],
    //         'session'=>$request['session'],
    //         'first_name'=>$request['first_name'],
    //         'last_name'=>$request[ 'last_name'],
    //         'other_names'=>$request['other_names'],
    //         'phone'=>$request['phone_number'],



    //     ]);

    //     //create the application number
    //     $code = $applicant->id < 1000 ? str_repeat("0", (4 - strlen("$applicant->id"))) . $applicant->id : $applicant->id;
    //     $application_number = getenv('SCHOOL_SHORT_CODE') . '-' . $code;

    //     $applicant->update([
    //         'application_number' => $application_number
    //     ]);

    //     Session::put('application_number',$application_number);


    //     return redirect()->route('applicant_bio_data')->with('success','Operation Succesful.. ');

    // }


}
