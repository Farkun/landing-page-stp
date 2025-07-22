<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function loginView() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('name', $request->name)->first();
        if (!$user) return back()->withErrors('Username or Password Invalid');
        $valid_password = Hash::check($request->password, $user->password); 
        if (!$valid_password) return back()->withErrors('Username or Password Invalid');
        $attempt = Auth::attempt(['name' => $request->name, 'password' => $request->password]);
        if (!$attempt) return back()->withErrors('Internal Server Error');
        $token = $user->createToken($user->name);
        $token = str_replace($token->accessToken->id.'|', '', $token->plainTextToken);
        session(['api_token' => $token]);
        return redirect()->route('dashboard');
    }
    
    public function logout() {
        Auth::logout();
        session(['api_token' => null]);
        return redirect()->route('login.view');
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'password' => 'required|string',
            'new_password' => 'required|string|confirmed',
        ]);
        if ($request->password == $request->new_password) return back()->withErrors("Can't reset passord that same to previous one");
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Password reset successfully');
    }

}
