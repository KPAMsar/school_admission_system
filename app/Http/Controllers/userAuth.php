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

        if(Auth::user()->Role == 'Admin'){
            return redirect(Route('admin_home'));
        }
        else if(Auth::user()->Role == 'Applicant'){
            return redirect(Route('applicant_home'));
        
        }
        else if(Auth::user()->Role == 'SuperAdmin'){
            return redirect()->Route('admin_home');
        
        }
    }
}
