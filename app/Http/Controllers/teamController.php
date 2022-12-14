<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\team;
use App\Models\matche;
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

    public function delete($id){
        $team = team::find($id);
        if(\Auth::user()->is_admin == 1){
            $team->delete();
        }
        else if(\Auth::user()->id == $team->user_id){
            $team->delete();
        }
        else{
            return redirect()->route('dashboard')->with('message', 'je mag dit team niet verwijderen');
        }
        return redirect()->route('dashboard')->with('message', 'Team deleted');
    }

    public function edit($id){
        $team = team::find($id);
        if(\Auth::user()->is_admin == 1 || \Auth::user()->id == $team->user_id){
            return view('update', [
                'team' => $team
            ]);
        }
        else{
            return redirect()->route('dashboard')->with('message', 'je mag dit team niet veranderen');
        }
    }

    public function update(request $request){
        $team = team::find($request->id);
        dd($team);
        $team->name = $request->name;
        $team->save();
        return redirect()->route('dashboard')
                ->with('message', 'Event succesvol veranderd');
    }

    // add player to team
    public function addTeamMate($id){
        $team = team::find($id);
        $user = User::all();
        return view('addPlayer', [
            'team' => $team,
            'user' => $user
        ]);
    }

    public function addPlayer(request $request){
        $team = team::find($request->id);
        $team->player1 = $request->player1;
        $team->player2 = $request->player2;
        $team->player3 = $request->player3;
        $team->player4 = $request->player4;
        $team->player5 = $request->player5;
        $team->save();
        return redirect()->route('dashboard')
                ->with('message', 'Event succesvol veranderd');
    }

    //add match score to database

    public function score(request $request){
        $match = matche::find($request->id);
        $match->team1_score = $request->team1_score;
        $match->team2_score = $request->team2_score;
        $match->save();

        //add points to team

        $team  = team::find($match->team1_id);
        $team2 = team::find($match->team2_id);
        
        
        if($request->team1_score > $request->team2_score){
            $team->points = $team->points + 3;
            $team->save();
        }
        else if($request->team1_score < $request->team2_score){
            $team2->points = $team2->points + 3;
            $team2->save();
        }
        else{
            $team->points = $team->points + 1;
            $team2->points = $team2->points + 1;
            $team->save();
            $team2->save();
        }
        

        return redirect()->route('dashboard')
                ->with('message', 'Event succesvol veranderd');
    }

}
