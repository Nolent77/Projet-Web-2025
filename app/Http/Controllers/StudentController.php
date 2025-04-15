<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Couchbase\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the class to hash the password
use function Laravel\Prompts\password;
use App\Models\User;

class StudentController extends Controller
{

    public function index()
    {
        return view('pages.students.index');
    }

    public function create_student(){

    return view('pages.students.create');
    }


    public function store_student(){

        $student = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'birth_day' => request('birth_day'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),

        ]);

        return response()->json([
            'message' => 'Étudiant créé avec succès !',
            'student' => $student]);
    }
}
