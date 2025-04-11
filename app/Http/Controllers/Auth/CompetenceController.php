<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cohort;
use App\Models\School;
use App\Models\UserSchool;
use App\Models\User;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->school()->pivot->role;
        $cohorts = School::getSchool();
        $students = User::getUsersByRole('student');
        $teachers = User::getUsersByRole('teacher');
        return view('pages.dashboard.dashboard-' . $userRole, compact('cohorts', 'students', 'teachers'));
    }
}
