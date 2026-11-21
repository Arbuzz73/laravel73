<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->role_id = $request->input('role_id'); 
        $user->save(); 

        return redirect()->back()->with('success', 'Роль успешно изменена!');
    }
}