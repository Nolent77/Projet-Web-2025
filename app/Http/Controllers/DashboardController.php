<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->school()->pivot->role; //Retrieve the authenticated user and his role using the ManyToMany relationship with the cohort_user table
        $cohorts = School::getSchool();
        // Returns users according to a given role with the getUserByRole() method defined in User.php
        $students = User::getUsersByRole('student');
        $teachers = User::getUsersByRole('teacher');
        return view('pages.dashboard.dashboard-' . $userRole, compact('cohorts', 'students', 'teachers')); //Dynamically loads a view according to the user's role
    }
}
