<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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

        if (!$user) {
            abort(403, 'utilisateur non authentifié.'); // If there is none, we return a 403 error.
        }
        // If he has the role of teacher, we'll send him his cohorts.
        if ($user->hasRole('teacher')) {
            $cohorts = $user->cohorts;
            return view('pages.cohorts.index_teacher', compact('cohorts'));
        }
        // If he has the admin role, we'll send all the cohorts back to him.
        if ($user->hasRole('admin')) {
            $cohorts = $user->cohorts;
            return view('pages.cohorts.index', compact('cohorts'));
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

        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }
}
