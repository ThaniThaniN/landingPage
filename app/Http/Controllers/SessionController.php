<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(Request $request){
        $attributes = request()->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'username' => 'Oops, these credentials do not match our records.']);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }
    public function destroy(){
        Auth::logout();
        return redirect()->route('admin.dashboard');
    }
}
