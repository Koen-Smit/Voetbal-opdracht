<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new Team
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                        <div class="form-group">
                            <label for="name">Team Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <input type="hidden" name="points" id="points" value="0">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>