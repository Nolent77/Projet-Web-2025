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
        $students = User::all();
        return view('pages.students.index', compact('students'));
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

    public function edit_student($id){
        $student = User::findOrFail($id); // Return a 404 error if the student doesn't exist
        return view('pages.students.edit', compact('student'));
    }

    public function update_student($id){
        $student = User::findorFail($id); // We recover the user with his id

        // We recover the new information of user (indicate in the new form)
        $student->first_name = request('first_name');
        $student->last_name = request('last_name');
        $student->birth_date = request('birth_date');
        $student->email = request('email');

        if(request('password')) // We hash the password only if we have a password
        {
            $student-> password = Hash::make(request('password'));
        }

        $student->save(); // We save the changes

        return response()->json([
            'message' => 'Étudiant modifié avec succès !',
            'student' => $student]);
    }

    public function delete_student($id){
        $student = User::findOrFail($id);
        $student->delete();

        return response()->json([
            'message' => "Étudiant supprimé avec succès !"
        ]);
    }
}
