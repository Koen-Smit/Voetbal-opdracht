<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\team;
use Illuminate\Support\Facades\Auth;

class teamController extends Controller
{
    public function create()
    {
        $id = Auth::id();
        return view('create', [
            'id' => $id
        ]);
    }
    public function store(){
        $team = new team();
        $team->name = request('name');
        $team->points = request('points');
        $team->user_id = request('user_id');
        $team->save();
        return redirect()->route('home');
    }
}
