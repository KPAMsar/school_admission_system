<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biodata;
use Jajo\NG;
use App\Models\applicant;
use App\Models\ApplicantionDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicationPayment;
use App\Models\ProgramAmount;
use Illuminate\Support\Facades\Hash;
use App\Models\ApplicationSubjects;
use App\Models\ApplicationPrograms;
use App\Models\ApplicationDetail;
use App\Models\ApplicationOLevelResult;
use App\Models\ApplicationSchool;
use App\Models\Payment;
use Illuminate\Facades\Support\Storage;


class applicantController extends Controller
{
    //  public function __construct()
    //  {
    //      $this->middleware('auth');
    // }

    private function verifyLogin()
    {
        
        if (Session::get('application_number') != null && Session::get('logged_in') != null) {
            //verify that user is applying for degree
            $applicant = applicant::where('application_number', Session::get('application_number'))->where('programme', 'DEGREE')->first();

            if ($applicant != null) {

                return true;
            } else {
                return false;
            }
        


        } 
        else
        {

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
        if ($this->verifyLogin()) {
        

        $applicant = biodata::where('application_number', Session::get('application_number'))->first();
            $ng = new NG();

            $states = $ng->states;
            return view('applicants.bio_data', ['pageName' => 'Bio-Data', 'applicant' => $applicant, 'states' => $states]);
        } else {
            //redirect to the login page
            return redirect('/admissions/login');
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


    public function loadApplicationForm()
    {
        if ($this->verifyLogin()) {
            $applicant = applicant::where('application_number', Session::get('application_number'))->first();

            if ($applicant != null && $applicant->status == 'Application') {
                //check payment details too
                $payment = ApplicationPayment::where('application_number', Session::get('application_number'))->first();

                if ($payment != null) {
                    //get the subjects
                    $subjects = ApplicationSubjects::where('status', 'Active')->orderBy('name')->get();

                    //get the programmes
                    $programmes = ApplicationPrograms::where('status', 'Active')->where('affiliation', Session::get('school'))->orderBy('course')->get();

                    return view('applicants.application', ['pageName' => 'Application', 'applicant' => $applicant, 'subjects' => $subjects, 'programmes' => $programmes]);
                } else {
                    //redirect to the payment page
                    return redirect('/admissions/dashboard/payment');
                }
                
            } else {
                //redirect to the payment page
                return redirect('/admissions/dashboard/payment');
            }
        } else {
            //redirect to the login page
            return redirect('/admissions/login');
        }
    }


    public function submitApplicationForm(Request $request)
    {
        if ($this->verifyLogin()) {
            $request->validate([
                'passport' => 'required',
                'first_choice' => 'required',
                'second_choice' => 'required',
                'year_of_graduation' => 'required',
                'first_sitting_result' => 'required',
                'birth_certificate' => 'required'
            ]);

            //upload the passport
            $passport = $request->file('passport');
            $extension = $passport->getClientOriginalExtension();
            $file_name = Session::get('application_number') . '.' . $extension;

            if ($passport->storeAs("passports", $file_name, "public")) {
                $application = ApplicationDetail::create([
                    'application_number' => Session::get('application_number'),
                    'first_choice' => $request['first_choice'],
                    'jamb_score' => $request['jamb_score'],
                    'second_choice' => $request['second_choice'],
                    'year_of_graduation' => $request['year_of_graduation'],
                    'passport' => $file_name,
                    'status' => 'Pending'
                ]);

                //add all olevel results
                $olevel = json_decode($request['olevel_result'], true);

                foreach ($olevel as $result) {
                    ApplicationOLevelResult::create([
                        'application_id' => $application->id,
                        'subject' => $result['subject'],
                        'grade' => $result['grade'],
                        'examination' => $result['examination'],
                        'sitting' => $result['sitting'],
                        'year' => $result['year']
                    ]);
                }

                //add all schools attended
                $schools = json_decode($request['schools_attended'], true);

                foreach ($schools as $school) {
                    ApplicationSchool::create([
                        'application_id' => $application->id,
                        'school_name' => $school['name'],
                        'reg_num' => $school['registration_no'],
                        'certificate' => $school['certificate'],
                        'institution' => $school['institution'],
                        'entry_year' => $school['entry_year'],
                        'year_graduated' => $school['year_graduated']
                    ]);
                }

                //upload documents
                if (!empty($request['first_sitting_result'])) {
                    $result = $request->file('first_sitting_result');
                    $extension = $result->getClientOriginalExtension();
                    $file_name = Session::get('application_number') . '.' . $extension;

                    if ($result->storeAs("first_sitting_results", $file_name, "public")) {
                        //update application
                        $application->update([
                            'first_sitting_olevel_result' => $file_name
                        ]);
                    }
                }

                if (!empty($request['second_sitting_result'])) {
                    $result = $request->file('second_sitting_result');
                    $extension = $result->getClientOriginalExtension();
                    $file_name = Session::get('application_number') . '.' . $extension;

                    if ($result->storeAs("second_sitting_results", $file_name, "public")) {
                        //update application
                        $application->update([
                            'second_sitting_olevel_result' => $file_name
                        ]);
                    }
                }

                if (!empty($request['birth_certificate'])) {
                    $result = $request->file('birth_certificate');
                    $extension = $result->getClientOriginalExtension();
                    $file_name = Session::get('application_number') . '.' . $extension;

                    if ($result->storeAs("birth_certificates", $file_name, "public")) {
                        //update application
                        $application->update([
                            'birth_certificate' => $file_name
                        ]);
                    }
                }

                //update applicant
                $applicant = applicant::where('application_number', Session::get('application_number'))->first();

                $applicant->update([
                    'status' => 'Submitted'
                ]);

                //redirect to application successful screen
                return redirect('/admissions/dashboard/application/success');
            } else {
                return redirect()->back()->with('error', 'An error occurred, please try again later.');
            }
        } else {
            //redirect to the login page
            return redirect('/admissions/login');
        }
    }


    public function showApplicationSuccess()
    {
        if ($this->verifyLogin()) {
            $applicant = Applicant::where('application_number', Session::get('application_number'))->first();

            return view('applicants.application_complete_success', ['applicant' => $applicant, 'pageName' => 'Application Completed']);
        } else {
            //redirect to the login page
            return redirect('/admissions/login');
        }
    }

    public function printApplicationSlip()
    {
        $applicant = Applicant::where('application_number', Session::get('application_number'))->first();
        $applicationNumber = Session::get('application_number');
        $applicantDetails = ApplicationDetail::where('application_number',$applicationNumber)->first();
        $firstchoice =$applicantDetails->first_choice;
        $secondchoice = $applicantDetails->second_choice;

        $first = ApplicationPrograms::where('course',$firstchoice)->first();
         $firstchoiceDuration = json_decode($first);

        $second = ApplicationPrograms::where('course',$secondchoice)->first();
         $secondchoiceDuration =json_decode($second);
        // /  dd($secondchoiceDuration);
        return view('applicants.print', [
            'pageName' => 'Print Slip', 
            'applicant' => $applicant,
            'applicantDetails'=>$applicantDetails,
            'firstchoiceDuration'=>$firstchoiceDuration, 
            'secondchoiceDuration'=>$secondchoiceDuration 
     ]);
    }



    public function queryPayment()
    {
        //get a pending payment ref
        $payment_attempts = Payment::where('payment_type', 'Degree Application')->where('status', 'Pending')->where('user', Session::get('application_number'))->get();

        if ($payment_attempts != null) {
            //run through all transactions and query for the right one if it exists
            $validTransaction = false;
            $queryResp = [];

            foreach ($payment_attempts as $payment_attempt) {
                $queryResp = $this->verifyPayment($payment_attempt->reference);
                if ($queryResp['status']) {
                    if ($queryResp['data']['status'] == "success" && $queryResp['message'] == 'Verification successful') {
                        $validTransaction = true;

                        break;
                    }
                }
            }

            if ($validTransaction) {
                //save payment details
                ApplicationPayment::create(
                    [
                        'application_number' => Session::get('application_number'),
                        'ref' => $queryResp['data']['reference'],
                        'amount' => $queryResp['data']['amount'] / 100,
                        'payment_method' => 'Paystack'
                    ]
                );

                //update the payment attempts table
                $payment_attempt = Payment::where('reference', $queryResp['data']['reference'])->first();
                $payment_attempt->update([
                    'status' => 'Completed'
                ]);

                //update the applicant's status to payment
                $applicant = Applicant::where('application_number', Session::get('application_number'))->first();

                $applicant->update([
                    'status' => 'Application'
                ]);

                //redirect to final the application form page
                return redirect('/admissions/dashboard/application');
            } else {
                return redirect()->back()->with('error', 'Sorry, it\'s like you don\'t have a pending payment record. If you are sure you made a payment that hasn\'t reflected on your account, please contact the admin.');
            }
        } else {
            return redirect()->back()->with('error', 'Sorry, it\'s like you don\'t have a pending payment record. If you are sure you made a payment that hasn\'t reflected on your account, please contact the admin.');
        }
    }


    private function sendGeneratedInvoice($receiver, $invoice_number)
    {
        
        $path = asset('images/logo.png');
        $logo = Storage::disk('local')->get('images/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($logo);

        // view()->share('properties', $properties);
        $pdf = PDF::loadView('backend.facility.invoice_pdf', ['invoice' => $invoice, 'items' => $items, 'invoice_to' => $invoice_to, 'company' => $company, 'logo' => $base64])->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save('invoices/' . $invoice->code . '.pdf');

        // return $pdf->download('invoice.pdf');

        //sending the mail
        $message = "<h3>Hello,</h3>
        <p>We have received your application for our degree programme. Find attached your application slip.</p>
        <br/>

        <p>Thank you,<br>Admissions Department,<br>COE, Warri.</p>
        ";


        $file_encoded = base64_encode(file_get_contents('invoices/' . $invoice->code . '.pdf'));

        return $this->sendEmailWithAttachment($receiver, "Admission Application", $message, $file_encoded, $invoice->code . '.pdf');
    }
    public function showAdmissionStatus(){
        return view('applicants.admission_status');
    }


}
