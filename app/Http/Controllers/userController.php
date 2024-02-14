<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function getAllEntreprises()
    {
        $entreprises = User::where('role', 'entreprise')->get();
        return view('user.entreprises', ['entreprises' => $entreprises]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $entreprises = User::where('role', 'entreprise')
            ->where('title', 'like', '%' . $query . '%')
            ->get();
        return view('user.entreprises', ['entreprises' => $entreprises]);
    }
}
