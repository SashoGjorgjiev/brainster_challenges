<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border mt-4">
        <h1 class="text-2xl font-semibold leading-6 text-gray-900 my-4 border border-gray-200 rounded">Create a new Player</h1>
        <form method="POST" action="{{ route('players.store') }}">
            @csrf
            <div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline
    -none focus:shadow-outline" id="first_name" type="text" placeholder=" Name" name="first_name">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline
    -none focus:shadow-outline" id="last_name" type="text" placeholder="Last Name" name="last_name">
                </div>

                <div class=" mb-4">
                    <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2">Date of birth</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:
                        outline-none focus:shadow-outline" id="date_of_birth" type="number" placeholder="Eg.1995" name="date_of_birth">
                </div>

                <div class=" mb-4">
                    <label for="team_id" class="block text-gray-700 text-sm font-bold mb-2">Team</label>
                    <select name="team_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg
                    -white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring">
                        @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class=" flex ">
                    <button type=" submit" class="bg-green-500 my-4 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded left-2">Save</button>
                </div>

            </div>
            <div>



</x-app-layout>