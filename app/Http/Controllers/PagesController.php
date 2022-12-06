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
        if(\Auth::user()->is_admin == 1){
            $team = team::all();
        }else{
            $team = team::where('user_id', \Auth::id())->get();
        }
        return view('dashboard', [
            'team' => $team
        ]);
    }

}
