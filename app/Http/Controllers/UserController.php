<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(User $user){
        // Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('moderators', $privileges)) {
            abort(403);
        }
        return view('admin.moderators.index', ['users' => $user->all()]);
    }
    public function create(){
        // Get the logged-in user's privileges
        $user =  Auth::user();
        $privileges = json_decode($user->privilege, true) ?? [];
        if (!in_array('moderators', $privileges)) {
            abort(403);
        }
        return view('admin.moderators.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'privilege' => ['array'],
        ]);

        $attributes['privilege'] = json_encode($request->privilege);
        User::create($attributes);

        return redirect()->route('admin.moderators.index')->with('success', 'User created successfully');
    }
    public function update(User $user, Request $request){

        $attributes = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'privilege' => ['required', 'max:255'],
        ]);
        $user->update($attributes);
        return redirect()->route('admin.moderators.index', ['users' => $user->all()]);
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function show(User $user){

        return view('admin.moderators.edit', ['user' => $user]);
    }
}
