<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('frontEnd.admin-dashboard.admin-dashboard');
    }
}
