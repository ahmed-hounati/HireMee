<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    public function cv()
    {
        return view('user.cv');
    }
}
