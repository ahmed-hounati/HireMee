<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;

class newsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if(Newsletter::isSubscribed($request->email)) {
            return redirect()->back()->with('error', 'You are already subscribed to our newsletter.');
        }

        Newsletter::subscribe($request->email);
        return redirect()->back()->with('status', 'Thanks for your subscription!');
    }
}
