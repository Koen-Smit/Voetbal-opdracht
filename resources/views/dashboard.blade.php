<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <p>
                    @if(session('message'))
                        {{session('message')}}
                    @endif
                </p>
                </div>
                <div>
                    
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>teamname</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team as $t)
                                <tr>
                                    <td>{{$t->name}}</td>
                                    <td><a href="{{route('edit', $t->id)}}">edit</a></td>
                                    {{-- <td><a href="{{route('delete', $t->id)}}">delete</a></td> --}}
                                    {{-- form for delete --}}
                                    <td>
                                        <form action="{{route('delete', $t)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">X</button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
