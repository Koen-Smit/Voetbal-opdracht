<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Player
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900">
                    <form action="{{route('addPlayer')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$team->id}}">
                        
                        <div class="form-group">
                            @foreach($user as $u)
                            <label for="name">Player Name1</label>
                            <select name="player1" id="player1">
                                    <option value=""></option>
                                    <option value="{{$u->name}}" name="player1">{{$u->name}}</option>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="name">Player Name2</label>
                            <select name="player2" id="player2">
                                    <option value=""></option>
                                    <option value="{{$u->name}}" name="player2">{{$u->name}}</option>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="name">Player Name3</label>
                            <select name="player3" id="player3">
                                    <option value=""></option>
                                    <option value="{{$u->name}}">{{$u->name}}</option>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="name">Player Name4</label>
                            <select name="player4" id="player4">
                                    <option value=""></option>
                                    <option value="{{$u->name}}">{{$u->name}}</option>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="name">Player Name5</label>
                            <select name="player5" id="player5">
                                    <option value=""></option>
                                    <option value="{{$u->name}}">{{$u->name}}</option>

                            </select>
                            <br>
                        </div>
                        @endforeach
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>