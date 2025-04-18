<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\School;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;


class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */

    // This method displays the different cohorts according to role
    public function index()
    {
        $user = auth()->user(); // Recovery of the authenticated User
        $schools = School::all();
        $cohorts = Cohort::all();



        if (!$user) {
            abort(403, 'utilisateur non authentifié.'); // If there is none, we return a 403 error.
        }
        // If he has the role of teacher, we'll send him his cohorts.
        if ($user->hasRole('teacher')) {
            return view('pages.cohorts.index_teacher', compact('cohorts' , 'schools'));
        }
        // If he has the admin role, we'll send all the cohorts back to him.
        if ($user->hasRole('admin')) {
            return view('pages.cohorts.index', compact('cohorts', 'schools'));
        }
        // If he does not have any of the roles, he will be denied access.
        abort(403, 'utilisateur non authentifié.');
    }

    /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */

    public function show(Cohort $cohort)
    {

    // We return the show view for the cohort, with the variable $cohort passed to the view

        return view('pages.cohort.show', [
            'cohort' => $cohort
        ]);
    }

    public function create()
    {
        // Displays the student creation form

        return view('pages.cohorts.create');
    }

    //name	description	start_date	end_date
    public function store(Request $request)
    {

//        $request->validate([
//            'school_id' => 'required',
//            'name' => 'required|string|max:255',
//            'description' => 'nullable|string',
//            'start_date' => 'required|date',
//            'end_date' => 'required|date',
//        ]);

        $cohort = Cohort::create([
            'school_id' => $request->school_id__,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('cohorts.index')->with('success', 'Étudiant ajouté avec succès, un email a été envoyé avec son mot de passe.'); //Redirection with success message

    }
}
