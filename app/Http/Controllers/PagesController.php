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

    public function generate(request $request){
        $teams = team::all();
        $matche = matche::find($request->id);
        $matche->field = $request->field;
        foreach($teams as $team){
            $next = false;
            foreach($teams as $secondTeam){
                $random = rand(1, $matche->field);
                if($next == true){
                    $match = new matche();
                    $match->field = $random;
                    $match->team1_id = $team->id;
                    $match->team2_id = $secondTeam->id;
                    $match->user_id = \Auth::user()->id;
                    $match->save();

                }
                if($team == $secondTeam){
                    $next = true;
                }
            }
        }
        return redirect()->route('toernooi');
    }
}
