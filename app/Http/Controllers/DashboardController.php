<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\School;
use App\Models\UserSchool;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->school()->pivot->role;
        $cohorts = Cohort::all();
        $students = User::getUsersByRole('student');
        $teachers = User::getUsersByRole('teacher');
        $schools = School::all();
        return view('pages.dashboard.dashboard-' . $userRole, compact('cohorts', 'students', 'teachers','schools' ));
    }
}
