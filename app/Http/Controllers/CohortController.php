<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */
    public function index()
    {
        $user= auth()->user();

        if (!$user){
            abort(403, 'utilisateur non authentifié.');
        }

        if ($user->hasRole('teacher')){
            $cohorts = $user->cohorts;
            return view('pages.cohorts.index_teacher', compact('cohorts'));
        }

        if ($user->hasRole('admin')){
            $cohorts = $user->cohorts;
            return view('pages.cohorts.index', compact('cohorts'));
        }

        abort(403, 'utilisateur non authentifié.');
    }


        /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */
    public function show(Cohort $cohort) {

        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }
}
