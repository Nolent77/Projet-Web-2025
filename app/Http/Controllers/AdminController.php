<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // to detect the vu (precise of type)

class AdminController extends Controller
{
    public function index(): View // to detect the vu (precise of type)
    {
        return view('admin.dashboard');
    }
}
