<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    public function admin(){
        if (\Auth::user()->is_admin == 1){
            $users = User::all();
            return view('admin', [
                'users' => $users
            ]);
        }
    }

    public function adminUpdate($id){
        if (\Auth::user()->is_admin == 1){
            $user = User::find($id);
            $user->is_admin = 1;
            $user->save();
            return redirect()->route('admin');
        }
    }
}
