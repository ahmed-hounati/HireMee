<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
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

    public function entreprise($id)
    {
        $entreprise = User::find($id);
        return view('user.oneEntreprise', ['entreprise' => $entreprise]);
    }

    public function archive($id)
    {
            $user = User::findOrFail($id);
            if ($user->role === 'user'){
                $user->delete();

                return back()->with('status', 'User archived successfully');
            }elseif($user->role === 'entreprise') {
                $user->delete();

                return back()->with('status', 'Entreprise archived successfully');
            }
            else return back()->with('error', 'Error');
    }

    public function statistics()
    {
        $stats = [];

        $stats['totalEnterprises'] = User::where('role', 'entreprise')->count();
        $stats['totalUsers'] = User::where('role', 'user')->count();
        $stats['totalJobOffers'] = Emploi::count();

        // Most active enterprise (based on job offers posted)
        $stats['mostActiveEnterprise'] = User::where('role', 'entreprise')
            ->withCount('jobOffers') // 'jobOffers' here is the name of the relation you defined in your User model
            ->orderBy('job_offers_count', 'desc')
            ->first();

        // User with the most applications
        // This assumes you have an 'applications' relation in your User model
        // with a user_id reference on an Applications table.
        $stats['mostApplicationsUser'] = User::where('role', 'user')
            ->withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->first();

        // Job with the most applications
        // This assumes you have an 'applications' relation in your Job model,
        // with a job_id reference on an Applications table.
        $stats['mostAppliedJob'] = Emploi::withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->first();

        return view('admin.dashboard', compact('stats'));
    }

    public function allUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', ['users' => $users]);

    }

    public function allEntreprises()
    {
        $entreprises = User::where('role', 'entreprise')->get();
        return view('admin.entreprises', ['entreprises' => $entreprises]);
    }
}
