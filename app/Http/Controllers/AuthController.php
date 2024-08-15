<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
	public function showLogin()     {         
		return view('auth-login');     
	}     
	 
	public function login(Request $request)     {         
		$credentials = $request->only('email', 'password');          
		if (Auth::attempt($credentials)) {             
			$request->session()->regenerate();             
			return redirect()->intended('dashboard');         
		}   
		
		return back()->withErrors([             
			'email' => 'The provided credentials do not match our records.',   
			]);     
	}      
		
	public function showRegister()     {    
		return view('auth-register');     
	}      
	
	public function register(Request $request)     {         
		$request->validate([             
			'name' => 'required|string|max:255',             
			'email' => 'required|string|email|max:255|unique:user',             
			'password' => 'required|string|min:8|confirmed',         
		]);          
		
		$user = User::create([             
			'name' => $request->name,             
			'email' => $request->email,             
			'password' => Hash::make($request->password),         
		]);          
		
		Auth::login($user);          
		
		return redirect('/dashboard');     
		
	}      
	
	public function logout(Request $request)     {         
		Auth::logout();         
		
		$request->session()->invalidate();         
		
		$request->session()->regenerateToken();          
		
		return redirect('/');     
	} 

}
