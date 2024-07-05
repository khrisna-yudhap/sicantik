<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::all()->count();
        $totalQuestions = Question::all()->count();
        $totalModules = Module::all()->count();


        return view('dashboard', [
            "title" => "Dashboard - SiCantik Admin Panel",
            "pageIndex" => 0,
            "totalUsers" => $totalUsers,
            "totalQuestions" => $totalQuestions,
            "totalModules" => $totalModules,
        ]);
    }
}
