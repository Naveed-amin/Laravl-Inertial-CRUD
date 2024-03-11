<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::create($request->all());
        return to_route('posts.index');
    }



    public function loginPage(){
        return Inertia::render('Auth/Login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('posts.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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
