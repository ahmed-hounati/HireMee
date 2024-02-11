<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = auth()->user()->role;
            if ($role === 'user') {
                return view('user.dashboard');
            } elseif ($role === 'entreprise') {
                return view('entreprise.home');
            } else if ($role === 'admin') {
                return view('admin.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
