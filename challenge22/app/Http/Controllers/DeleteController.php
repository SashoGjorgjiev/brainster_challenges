<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeleteController extends Controller
{
    public function destroy()
    {
        session()->flush();

        return redirect()->to('home');
    }
}
