<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        return view('auth.profile');
    }

    public function password(Request $request){
        $request->validate([
            'password' => ['required','min:8', 'confirmed'],
        ]);
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('flash_message_success'," Password Succesfully Changed");;
    }
}
