<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cohort;
use App\Models\School;
use App\Models\UserSchool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompetenceController extends Controller
{
    public function index()
    {
        //$enseignant = Auth::user();
        //$promotions = $enseignant->cohorts; // relation many-to-many

        return view('pages.groups.index');
    }
}
