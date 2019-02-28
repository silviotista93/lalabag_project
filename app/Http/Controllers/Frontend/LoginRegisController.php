<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginRegisController extends Controller
{
    public function index(){
        return view('frontend.auth.login_registro');
    }
}
