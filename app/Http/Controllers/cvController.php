<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class cvController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if($user->cv) {
            $cv = $user->cv;
        } else {
            $cv = new Cv();
            $cv->compet = ['ur compe'];
            $cv->experiences = ['ur experiences'];
            $cv->cursus = ['ur cursus'];
            $cv->langues = ['ur languages'];
            return view('user.cv', ['cv' => $cv]);
        }

        // Decode the json into arrays for displaying in the form
        $cv->compet = json_decode($cv->compet, true);
        $cv->experiences = json_decode($cv->experiences, true);
        $cv->cursus = json_decode($cv->cursus, true);
        $cv->langues = json_decode($cv->langues, true);
        // Return the view.
        return view('user.cv', ['cv' => $cv]);
    }

    public function store()
    {
        request()->validate([
            'compet' => ['required', 'array'],
            'experiences' => ['required', 'array'],
            'cursus' => ['required', 'array'],
            'langues' => ['required', 'array'],
        ]);

        $competencesJson = json_encode(request()->input('compet'));
        $experiencesJson = json_encode(request()->input('experiences'));
        $cursusJson = json_encode(request()->input('cursus'));
        $languesJson = json_encode(request()->input('langues'));

        $userId = auth()->user()->id;


        $cvData = [
            'user_id' => $userId,
            'compet' => $competencesJson,
            'experiences' => $experiencesJson,
            'cursus' => $cursusJson,
            'langues' => $languesJson,
        ];

        Cv::updateOrCreate(['user_id' => $userId], $cvData);

        return redirect()->route('home');
    }

    public function show(){
        $cv = Cv::where('user_id', auth()->id())->firstorfail();
        $cv->compet = json_decode($cv->compet, true);
        $cv->experiences = json_decode($cv->experiences, true);
        $cv->cursus = json_decode($cv->cursus, true);
        $cv->langues = json_decode($cv->langues, true);

        $user = $cv->user;


        return view('user.show', ['cv' => $cv, 'user' => $user]);
    }


}
