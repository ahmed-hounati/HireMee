<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.user_register', ['role' => 'user']);
    }

    public function createEntreprise(): View
    {
        return view('auth.entreprise_register', ['role' => 'entreprise']);
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'title' => 'nullable|string|max:255',
            'post' => 'nullable|string|max:255',
            'industrie' => 'nullable|string|max:255',
            'about' => 'nullable|string|max:500',
            'picture' => 'required',
        ]);



        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('picture'), $imagePath);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->post = $request->post;
        $user->industries = $request->industries;
        $user->about = $request->about;

        $user->picture = $imagePath;


        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
