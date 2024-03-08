<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function registerStore(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::create($user);
        return to_route('posts.index');
    }

    public function users()
    {

        return Inertia::render('Auth/Index', [
            'users' => User::all()
        ]);
    }


    public function editUser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        return Inertia::render('Auth/Edit', [
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->update($request->all());

        return to_route('user.index');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return to_route('user.index');
    }
}
