<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toernooi
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- link to generate --}}
        <a href="{{route('generate')}}" class="btn btn-primary">Generate</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>team 1</th>
                    <th>team 2</th>
                    <th>Random score</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                    <tr style="vertical-align: middle;">
                        @foreach ($teams as $team)
                            
                                @if ($match->team1_id == $team->id)
                                <td>
                                {{$team->name}}
                            </td>
                                @endif
                            
                            
                                @if ($match->team2_id == $team->id)
                                <td>
                                {{$team->name}}
                            </td>
                                @endif
                        @endforeach
                        <td>
                            <form action="{{Route('score')}}" method="POST">
                                @csrf
                                    <?php
                                        //random score
                                        $match->score1 = rand(0, 5);
                                        $match->score2 = rand(0, 5);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="{{$match->id}}">
                                    <input type="hidden" name="team1_score" id="team1_score" value="{{$match->score1}}">
                                    <input type="hidden" name="team2_score" id="team2_score" value="{{$match->score2}}">
                                    <input type="hidden" name="match_id" id="match_id" value="{{$match->id}}">
                                    <button class="btn btn-primary">Set Score</button>                                       
                            </form>
                        </td>
                        <td>
                            {{$match->team1_score}} - {{$match->team2_score}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-app-layout>