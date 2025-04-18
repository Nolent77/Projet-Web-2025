<?php

namespace App\Http\Controllers;

use App\Models\UserSchool;
use App\Notifications\SendStudentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the class to hash the password
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{

    public function index()
    {
        // We retrieve all users with the student role via a join on the users_schools table

        $teachers = DB::table('users')
            ->join('users_schools', 'users.id', '=', 'users_schools.user_id')
            ->where('users_schools.role', 'student')
            ->select('users.*')
            ->get();

        // The list of students is sent to the

        return view('pages.teachers.index', compact('teachers'));
    }

    public function create(){

        // Displays the student creation form

        return view('pages.teachers.create');
    }

    // Retrieves the data from the form and creates the student
    public function store(Request $request)
    {

        // Validation of mandatory fields

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required|date',
        ]);

        $randomPassword = Str::random(8); // Generates a random 8-character password

        // Inserts the student in the users table and retrieves the inserted ID
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($randomPassword), // Encrypts the password before storing it
        ]);

        // We link the user to a school --> The student is linked to the school with ID 1 and has the student role

        UserSchool::create([
            'user_id' => $user->id,
            'school_id' => 1,
            'role' => 'student'
        ]);

        return redirect()->route('teachers.index')->with('success', 'Prof ajouté avec succès, un email a été envoyé avec son mot de passe.'); //Redirection with success message
    }

    public function edit($id){

        // Retrieves the student ID and returns the pre-filled form

        $teachers = User::findOrFail($id); // Return a 404 error if the student doesn't exist with findOrFail methode
        return view('pages.teachers.edit', compact('teachers'));
    }

    public function update(Request $request, $id)
    {
        // Validate the data sent via the update form

        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($id); // Return a 404 error if the student doesn't exist with findOrFail methode
        $user->update($validated); // The user is updated with the data validated in the database

        return redirect()->back()->with('success', 'Prof mis à jour');
    }

    public function getForm(Request $request)
    {
        // We validate the data received in the request

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'birth_date' => 'required|date',
            'password' => 'required|min:6', // The password must be at least 6 characters long
        ]);

        // We return a JSON response with the success information and the validated data
        return response()->json([
            'success' => true,
            'message' => 'Formulaire reçu avec succès !',
            'data' => $validatedData
        ]);
    }

    public function delete($id)
    {
        //  Removes the student from both users and the pivot table users_schools

        DB::table('users')->where('id', $id)->delete();
        DB::table('users_schools')->where('user_id', $id)->delete();

        return redirect()->route('teachers.index')->with('success', 'Prof supprimé');
    }
}
