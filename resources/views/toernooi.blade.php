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
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-app-layout>