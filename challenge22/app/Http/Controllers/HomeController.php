<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $firstName = session('first_name', 'YOU');
        $lastName = session('last_name', 'YOU');
        return view('home', compact('firstName', 'lastName'));
    }
}
