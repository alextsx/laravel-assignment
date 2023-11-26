<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $users = User::paginate(10); // Display 10 users per page
        return view('edit-users', ['users' => $users]);
    }

    public function togglePremium($id)
    {
        $user = User::findOrFail($id);
        $user->isPremium = !$user->isPremium;
        $user->save();
        return redirect()->route('users')->with('success', 'User premium status toggled');
    }
}
