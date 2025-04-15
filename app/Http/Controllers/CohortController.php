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
        $teacher= Auth::user();

        if (!$teacher){
            abort(403, 'utilisateur non authentifié.');
        }

        $cohorts = $teacher->cohorts;

        return view('pages.cohorts.index', compact('cohorts'));
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
