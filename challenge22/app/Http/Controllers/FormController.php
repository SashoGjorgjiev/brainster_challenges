<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha|max:15',
            'last_name' => 'required|alpha|max:25',
            'email' => 'nullable|email',
        ]);

        if ($validator->fails()) {
            return redirect('/form')
                ->withErrors($validator)
                ->withInput();
        }

        // Validation passed, store the data in session
        session(['first_name' => $request->input('first_name')]);
        session(['last_name' => $request->input('last_name')]);
        session(['email' => $request->input('email')]);

        return redirect('/info');
    }
}
