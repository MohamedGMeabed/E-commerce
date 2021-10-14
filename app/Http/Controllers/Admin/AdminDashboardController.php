<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // public function category()
    // {
    //     return view('backend.category');
    // }

    // public function login()
    // {
    //     return view('backend.admin.login');
    // }

}
