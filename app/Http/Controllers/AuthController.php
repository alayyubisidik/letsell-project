<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('get')){
            return view('auth.login');
        }else{
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
    
            $user = User::where('username', $request->input('username'))->first();
    
            if (!$user) {
                return redirect('/login')->with('message-error', 'Username or password incorrect');
            }
        
            if (!Hash::check($request->input('password'), $user->password)) {
                return redirect('/login')->with('message-error', 'Username or password incorrect');
            }

            if(!$user->status){
                return redirect('/login')->with('message-error', 'Your account has not been approved');
            }
    
            $request->session()->put('role', $user->role);
            $request->session()->put('username', $user->username);

            if($user->role === 'admin'){
                return redirect('/dashboard');
            }else{
                return redirect('/');
            }
    
        }
    }

    public function register (Request $request){

        if($request->isMethod('get')){
            return view('auth.register');
        }else{
            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'username' => 'required|string|min:3|unique:users,username',
                'password' => 'required|string|min:6',
                'contact' => 'required|numeric|min:11',
                'nisn' => 'required|numeric|min:4|unique:users,nisn',
                'profile_picture' => 'image|mimes:jpeg,png,jpg|max:2048', 
            ]);
    
            $imageNameForDB = "pp-default.jpeg";
    
            if($request->file('profile_picture')){
                $image = $request->file('profile_picture');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('profile-picture', $imageName, 'public');
                $imageNameForDB = $imageName;
            }
    
            $user = User::create([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'contact' => $request->input('contact'),
                'nisn' => $request->input('nisn'),
                'profile_picture' => $imageNameForDB
            ]);
    
            return redirect('/login');      
        }
    }

    public function logout(Request $request){
        $request->session()->forget('role');
        $request->session()->forget('username');
        return redirect('/');
    }


}
