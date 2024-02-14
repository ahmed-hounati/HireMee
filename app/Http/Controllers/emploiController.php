<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class emploiController extends Controller
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

    public function seeApplications(Emploi $emploi)
    {
        $applications = Candidature::where('candidatures.emploi_id', $emploi->id)
            ->join('users', 'users.id', '=', 'candidatures.user_id')
            ->get();

        return view('entreprise.emplois.allApplications', compact('emploi', 'applications'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $offers = Emploi::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('contract', 'like', '%' . $query . '%')
            ->orWhere('emplacement', 'like', '%' . $query . '%')
            ->get();

        $appliedOffers = Candidature::where('user_id',Auth::id())->get()->pluck('emploi_id')->toArray();

        /*The idea here is to have a $offers are a list of job offers that match the search query, and each offer holds
        another value: if the user has applied to that offer, 'true', if not, 'false' */

        $offers = $offers->map(function ($offer) use($appliedOffers) {
            return ['offer'=>$offer,'hasApplied'=>in_array($offer->id,$appliedOffers)];
        });

        return view('user.emplois',compact('offers'));
    }
}
