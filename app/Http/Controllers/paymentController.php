<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicationPayment;
use App\Models\Payment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\biodata;
use App\Models\ProgramAmount;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function redirectToGateway(Request $request)
    {
        try{
            // dd($request->payment_type);
            //save the transaction reference in payment attempts table
            Payment::create([
                'user' => Session::get('application_number'),
                'payment_method' => 'Paystack',
                'reference' => $request->reference,
                'payment_type' => $request->payment_type
            ]);

            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        
        if($paymentDetails['message'] == 'Verification successful' && $paymentDetails['data']['gateway_response'] == 'Successful'){
            // dd($paymentDetails);
            // you can store the authorization_code in your db to allow for recurrent subscriptions
            //save payment details
            ApplicationPayment::create(
                [
                    'application_number' => Session::get('application_number'),
                    'ref' => $paymentDetails['data']['reference'],
                    'amount' => $paymentDetails['data']['amount']/100,
                    'base_amount' => ($paymentDetails['data']['amount']/100) - 1000,
                    'payment_method' => 'Paystack'
                ]
            );

            //update the payment attempts table
            $payment_attempt = Payment::where('reference', $paymentDetails['data']['reference'])->first();
            $payment_attempt->update([
                'status' => 'Completed'
            ]);

            //update the applicant's status to payment
            $applicant = Applicant::where('application_number', Session::get('application_number'))->first();
            
            $applicant->update([
                'status' => 'Application'
            ]);

            //redirect to the right path
            if($applicant->programme == 'DEGREE'){
                return redirect('/admissions/dashboard/application');
            }else if($applicant->programme == 'NCE'){
                return redirect('/admissions/nce/dashboard/application');
            }    

        }else{
            return redirect('/');
        }
        
    }

    public function loadPayment()
    {
        //ensure use is logged in
        if ($this->verifyLogin()) {
            //ensure user has filled bio-data form
            $biodata = biodata::where('application_number', Session::get('application_number'))->first();

            if ($biodata != null) {
                //check if user has already paid
                $payment = ApplicationPayment::where('application_number', Session::get('application_number'))->first();
                if ($payment == null) {
                    $applicant = applicant::where('application_number', Session::get('application_number'))->first();

                    //get the amount to be paid
                    $programme_amount = ProgramAmount::where('programme', $applicant->programme)->first();
                    $applicant->amount = $programme_amount->amount;
                    return view('applicants.payment', ['pageName' => 'Payment', 'applicant' => $applicant, 'biodata' =>  $biodata]);

                } else {
                    //user has already made payment
                    return redirect('/admissions/dashboard/application');
                }
            } else {
                //redirect to bio-data form
                return redirect()->route('applicant_bio_data');
            }
        } else {
            //redirect to the login page
            return redirect('admission/login');
        }
    }

    private function verifyLogin()
    {
        if (Session::get('application_number') != null && Session::get('logged_in') != null) {
            //verify that user is applying for nce
            $applicant = applicant::where('application_number', Session::get('application_number'))->first();

            if ($applicant != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

 
}