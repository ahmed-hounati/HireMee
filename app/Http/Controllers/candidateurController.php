<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class candidateurController extends Controller
{
    public function store($emploi)
    {
        $user_id = auth()->user()->id;
        DB::table('candidatures')->insert( ['user_id' => $user_id, 'emploi_id' => $emploi] );
        return to_route('user.emplois');
    }


}
