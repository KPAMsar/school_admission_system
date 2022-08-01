<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAuth extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        // if(Auth::user()->Role === 'Admin'){
        //     return redirect()->route('admin_home');
        // }
        // elseif(Auth::user()->Role == 'Applicant'){
        //     return redirect()->route('applicant_home');
        // }

        if(Auth::user()->Role == 'Admin'){
            return redirect(Route('admin_home'));
        }
        else if(Auth::user()->Role == 'Applicant'){
            return redirect(Route('applicant_home'));
        
        }
    }
}
