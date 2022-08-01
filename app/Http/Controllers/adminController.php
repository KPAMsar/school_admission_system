<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;

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
}
