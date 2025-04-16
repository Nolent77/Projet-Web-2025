<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Couchbase\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the class to hash the password
use function Laravel\Prompts\password;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $students = DB::table('users')
            ->join('users_schools', 'users.id', '=', 'users_schools.user_id')
            ->where('users_schools.role', 'student')
            ->select('users.*')
            ->get();

        return view('pages.students.index', compact('students'));
    }

    // Create Student

    public function create(){

    return view('pages.students.create');
    }

    // Store Student

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required|date',
            'password' => 'required|min:6'
        ]);

        $userId = DB::table('users')->insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users_schools')->insert([
            'user_id' => $userId,
            'school_id' => 1, // à adapter
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('students.index')->with('success', 'Étudiant ajouté avec succès');
    }

    // Edit Student

    public function edit($id){
        $student = User::findOrFail($id); // Return a 404 error if the student doesn't exist
        return view('pages.students.edit', compact('student'));
    }


    // Update Student

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->back()->with('success', 'Étudiant mis à jour');
    }

    // Delete Student

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        DB::table('users_schools')->where('user_id', $id)->delete();

        return redirect()->route('students.index')->with('success', 'Étudiant supprimé');
    }
}
