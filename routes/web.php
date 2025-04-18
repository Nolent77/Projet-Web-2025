<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AdminController; // Add of class AdminController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;


// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');

        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');

        // Students
        Route::get('students', [TeacherController::class, 'index'])->name('student.index');

        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups //Modification of Controller | GroupController --> CohortController
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');

        // Admin
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

        // Student Action
        Route::get('/students', [StudentController::class, 'index'])->name('student.index');
        Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('form/students/{students}', [StudentController::class, 'update'])->name('form.students.update'); // Route to the form
        Route::get('/students/{students}', [StudentController::class, 'getForm'])->name('students.update'); // Route to recup the form's infos
        Route::delete('/students/{id}', [StudentController::class, 'delete'])->name('students.delete');

        //Mail
        Route::get('send-mail' , [EmailController::class, 'SendPassword'])->name('send-mail');

        // Cohort Action
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohorts.index');
        Route::get('cohorts/create', [CohortController::class, 'create'])->name('cohorts.create');
        Route::post('/cohorts', [CohortController::class, 'store'])->name('cohorts.store');
        Route::delete('/cohorts/{id}', [CohortController::class, 'delete'])->name('cohorts.delete');

        //Teacher  Action
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
        Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
        Route::put('form/teachers/{teachers}', [TeacherController::class, 'update'])->name('form.teachers.update'); // Route to the form
        Route::get('/teachers/{teachers}', [TeacherController::class, 'getForm'])->name('teachers.update'); // Route to recup the form's infos
        Route::delete('/teachers/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');
    });

});

require __DIR__.'/auth.php';
