<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entrepriseController extends Controller
{
    public function index()
    {
        return view('entreprise.dashboard');
    }
    public function create()
    {
        return view('entreprise.form');
    }
    public function offres()
    {
        return view('entreprise.offres');
    }

}
