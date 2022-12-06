<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;

class PagesController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    //user zie alleen zijn eigen team
    public function team()
    {
        $team = team::where('user_id', auth()->user()->id)->get();
        return view('dashboard', [
            'team' => $team
        ]);
    }

}
