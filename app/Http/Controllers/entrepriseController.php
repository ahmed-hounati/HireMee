<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Emploi;
use Illuminate\Http\Request;

class entrepriseController extends Controller
{
    public function index()
    {
        $offers = Emploi::All();
        $user = auth()->user()->id;
        return view('entreprise.emplois.all', ['offers' => $offers , 'user' =>$user]);
    }

    public function create()
    {
        return view('entreprise.emplois.create');
    }

    public function store()
    {
        request()->validate([
            'image' => ['required'],
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'competences' => ['required', 'array'],
            'contract' => ['required'],
            'emplacement' => ['required'],
        ]);
        $competencesJson = json_encode(request()->input('competences'));
        $data = request()->all();

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagePath);
        } else {
            $imageName = 'service.png';
        }

        $emploi = new Emploi();
            $emploi->user_id = auth()->user()->id;
            $emploi->title = $data['title'];
            $emploi->description = $data['description'];
            $emploi->contract = $data['contract'];
            $emploi->emplacement = $data['emplacement'];
            $emploi->competences = $competencesJson;

            $emploi->image = $imagePath;


            $emploi->save();
        return to_route('entreprise.emplois.all');
    }

    public function edit(Emploi $emploi)
    {
        return view('entreprise.emplois.edit', ['emploi' => $emploi]);
    }

    public  function update(Request $request, $id)
    {
        $emploi = Emploi::findOrFail($id);

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'competences' => ['required', 'array'],
            'contract' => ['required'],
            'emplacement' => ['required'],
        ]);

        $competencesJson = json_encode($request->input('competences'));

        $emploi->user_id = auth()->user()->id;
        $emploi->title = $request->input('title');
        $emploi->description = $request->input('description');
        $emploi->contract = $request->input('contract');
        $emploi->emplacement = $request->input('emplacement');
        $emploi->competences = $competencesJson;
        $data = request()->all();

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagePath);
        } else {
            $imageName = 'service.png';
        }

        $emploi->save();
        return to_route('entreprise.emplois.all');
    }

    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return to_route('entreprise.emplois.all');
    }

    public function jobs()
    {
        $offers = Emploi::all();
        $user_id = auth()->user()->id;

        $offersWithApplicationStatus = $offers
            ->map(function ($offer) use ($user_id) {
                $hasApplied = Candidature::where('user_id', $user_id)
                    ->where('emploi_id', $offer->id)
                    ->exists();

                return [
                    'offer' => $offer,
                    'hasApplied' => $hasApplied,
                ];
            });

        return view('user.emplois', ['offers' => $offersWithApplicationStatus]);
    }
}
