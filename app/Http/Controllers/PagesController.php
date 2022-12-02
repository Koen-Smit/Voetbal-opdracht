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
    public function team()
    {
        $team = team::all();
        return view('dashboard', [
            'team' => $team
        ]);
    }
}
