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

}
