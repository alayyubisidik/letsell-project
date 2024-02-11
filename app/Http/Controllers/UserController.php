<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profilePage()
    {

        $user = User::where('username', Auth::user()->username)->first();

        return view('profile.index', [
            "user" => $user
        ]);
    }

    public function profileEdit(Request $request)
    {

        $user = User::where('username', Auth::user()->username)->first();

        if ($request->isMethod('get')) {

            return view('profile.edit', [
                "user" => $user
            ]);
        } else {
            $request->validate([
                'name' => 'string|min:3|max:255',
                'contact' => 'numeric|min:11',
                'nisn' => 'numeric|min:4',
                'profile_picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);


            if ($request->file('profile_picture')) {
                if($user->profile_picture !== 'pp-default.jpeg'){
                    Storage::disk('public')->delete('profile-picture/' . $user->profile_picture);
                }

                $image = $request->file('profile_picture');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('profile-picture', $imageName, 'public');

                // Update nama gambar profil di database
                $user->profile_picture = $imageName;
            }

            // Update data pengguna jika ada perubahan
            $user->name = $request->input('name', $user->name);
            $user->username = $request->input('username', $user->username);
            $user->contact = $request->input('contact', $user->contact);
            $user->nis = $request->input('nis', $user->nis);

            $user->save();

            return redirect('/profile')->with('message-success', 'Profile updated successfully');
        }

    }

    public function changePassword(Request $request){
    
        if($request->isMethod('GET')){
            return view('profile.change-password');
        }else{

            $request->validate([
                'old_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6',
                'confirm_password' => 'required|string|min:6|same:new_password',
            ]);

            $user = User::where('username', Auth::user()->username)->first();

            if (!$user || !Hash::check($request->input('old_password'), $user->password)) {
                return redirect('/profile')->with('message-error', 'Current password is incorrect');
            }

            // Update password
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            return redirect('/profile')->with('message-success', 'Password changed successfully');

        }
    }

    
}
