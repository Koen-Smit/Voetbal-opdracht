<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;
use App\Models\matche;

class PagesController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    //user zie alleen zijn eigen team
    public function team()
    {
        $team = team::all();
        return view('dashboard', [
            'team' => $team
        ]);
    }
    public function toernooi()
    {
        $teams = team::all();
        $matches = matche::all();
        return view('toernooi', [
            'matches' => $matches,
            'teams' => $teams
        ]);
    }
    }
}
