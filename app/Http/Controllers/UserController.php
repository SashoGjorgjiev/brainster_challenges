<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Events\ActivationAcount;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type',  'regular')->get();
        return response()->json($users);


        // return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => 'regular',
            'is_active' => false,
        ]);


        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function deactivate($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 400);
        }

        $user->update(['is_active' => false]);

        return response()->json(['message' => 'User deactivated successfully'], 200);
    }
}
