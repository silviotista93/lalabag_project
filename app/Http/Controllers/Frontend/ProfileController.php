<?php

namespace App\Http\Controllers\Frontend;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('frontend.profile.profile', compact('categorias'));
    }
}
