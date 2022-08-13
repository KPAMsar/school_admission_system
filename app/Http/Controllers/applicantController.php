<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biodata;
use Jajo\NG;
use App\Models\applicant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicationPayment;
use App\Models\ProgramAmount;
use Illuminate\Support\Facades\Hash;


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
            $applicant = Applicant::where('application_number', Session::get('application_number'))->where('programme', 'DEGREE')->first();

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


    
    public function applicationLogin($applicaton_number = '')
    {
        return view('applicants.application_login', ['application_number' => !empty($applicaton_number) ? $applicaton_number : (Session::get('application_number') != null ? Session::get('application_number') : '')]);
    }

    public function processApplicationLogin(Request $request)
    {
        $request->validate([
            'application_number' => 'required',
            'password' => 'required'
        ]);

        //load the applicants details
        $applicant = applicant::where('application_number', $request['application_number'])->first();

        if ($applicant != null) {
            //validate the password
            if (Hash::check($request['password'], $applicant->password)) {
                Session::put('application_number', $request['application_number']);
                Session::put('logged_in', true); //subsequently use a token instead

                //load the applicant's dashboard based on type of application
                if ($applicant->programme == 'DEGREE') {
                    return redirect()->route('applicant_dashboard_page')->with('success','Welcome back');
                } else {
                    return redirect()->route('applicant_nce_application_page');
                }
            } else {
                return redirect()->back()->with('error', 'Wrong login details');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong login details');
        }
    }



    public function bioData()
    {
        //first verify if use is logged in
        if (!$this->verifyLogin()) {
        $applicant = biodata::where('application_number', Session::get('application_number'))->first();
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
        
        $lgas = $ng->getLGA($sendData['state']);
        
        return response()->json(array('lga'=>json_encode($lgas)), 200);
    }

    public function saveBioData(Request $request)
    {
        $request->validate([
            'address_1' => 'required|max:255',
            'city_1' => 'required',
            'country_of_residence' => 'required',
            'country_of_origin' => 'required',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required'
        ]);

        $application_no = Session::get('application_number');
        if (empty($application_no)) return redirect('/admissions/login');

        $dob = $request['dob_year'] . '-' . $request['dob_month'] . '-' . $request['dob_day'];

        // $applicant = applicant::where('application_number', $application_no)->first();

        //check if doesn't record exist
        $applicant = biodata::where('application_number', Session::get('application_number'))->first();

        if ($applicant == null) {
            biodata::create([
                'application_number' => $application_no,
                'address_1' => $request['address_1'],
                'address_2' => $request['address_2'],
                'city_1' => $request['city_1'],
                'city_2' => $request['city_2'],
                'country_residence' => $request['country_of_residence'],
                'state_residence' => $request['state_of_residence'],
                'lga_residence' => $request['lga_of_residence'],
                'country_origin' => $request['country_of_origin'],
                'state_origin' => $request['state_of_origin'],
                'lga_origin' => $request['lga_of_origin'],
                'dob' => $dob,
                'nok_first_name' => $request['nok_first_name'],
                'nok_last_name' => $request['nok_last_name'],
                'nok_phone' => $request['nok_phone_number'],
                'nok_email' => $request['nok_email'],
                'nok_address' => $request['nok_address'],
                'nok_city' => $request['nok_city'],
                'nok_country' => $request['nok_country_of_residence'],
                'nok_state' => $request['nok_state_of_residence'],
                'nok_lga' => $request['nok_lga_of_residence']
            ]);


            //update the applicant status
        $applicant = applicant::where('application_number', Session::get('application_number'))->first();
        // $applicant = Applicant::where('application_number', Session::get('application_number'))->first();
            $applicant->update([
                'status' => 'Payment'
            ]);

            //redirect to the payment page
            return redirect('/admissions/dashboard/payment');

        } else {
            //update the bio data details
            $bioData = biodata::where('application_number', $application_no)->first();

            $bioData->update([
                'address_1' => $request['address_1'],
                'address_2' => $request['address_2'],
                'city_1' => $request['city_1'],
                'city_2' => $request['city_2'],
                'country_residence' => $request['country_of_residence'],
                'state_residence' => $request['state_of_residence'],
                'lga_residence' => $request['lga_of_residence'],
                'country_origin' => $request['country_of_origin'],
                'state_origin' => $request['state_of_origin'],
                'lga_origin' => $request['lga_of_origin'],
                'dob' => $dob,
                'nok_first_name' => $request['nok_first_name'],
                'nok_last_name' => $request['nok_last_name'],
                'nok_phone' => $request['nok_phone_number'],
                'nok_email' => $request['nok_email'],
                'nok_address' => $request['nok_address'],
                'nok_city' => $request['nok_city'],
                'nok_country' => $request['nok_country_of_residence'],
                'nok_state' => $request['nok_state_of_residence'],
                'nok_lga' => $request['nok_lga_of_residence']
            ]);

            return redirect()->back()->with('success', 'You have successfully updated your details.');

        }
    }


    public function loadPayment()
    {
        //ensure use is logged in
        if ($this->verifyLogin()) {
            //ensure user has filled bio-data form
            $biodata = biodata::where('application_number', Session::get('application_number'))->first();

            if ( $biodata != null) {
                //check if user has already paid
                $payment = ApplicationPayment::where('application_number', Session::get('application_number'))->first();
                if ($payment == null) {
                    $applicant = applicant::where('application_number', Session::get('application_number'))->first();

                    //get the amount to be paid
                    $programme_amount = ProgramAmount::where('programme', $applicant->programme)->first();
                    $applicant->amount = $programme_amount->amount;

                    return view('applicants.payment', ['pageName' => 'Payment', 'applicant' => $applicant, 'bio-data' =>  $biodata]);
                } else {
                    //user has already made payment
                    return redirect('/admissions/dashboard/application');
                }
            } else {
                //redirect to bio-data form
                return redirect('applicant_bio_data');
            }
        } else {
            //redirect to the login page
            return redirect('/admissions/login');
        }
    }

 
    public function applicationPage()
    {
        $applicant = applicant::where('application_number', Session::get('application_number'))->first();
        return view('applicants.Degree.dashboard',['applicant'=>$applicant]);
    }

    public function nceapplicationPage()
    {
        $applicant = applicant::where('application_number', Session::get('application_number'))->first();
        return view('applicants.nce.dashboard',['applicant'=>$applicant]);
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

    public function showAdmissionStatus(){
        return view('applicants.admission_status');
    }


}
