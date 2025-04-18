<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View; // To detect the vu (precise of type)

class AdminController extends Controller
{
    public function index(): View // To detect the vu (precise of type)
    {
        return view('admin.dashboard');
    }
}
