<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border mt-4">
        <h1 class="text-2xl font-semibold leading-6 text-gray-900 my-4 border border-gray-200 rounded">Create a new match</h1>
        <form method="POST" action="{{ route('matches.store') }}">
            @csrf
            <div>
                <label for="home_team_id" class="block font-medium text-sm text-gray-700">Home Team</label>
                <select id="home_team_id" name="home_team_id" class="block w-full px-4 py-2
                mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400
                focus:outline-none focus:ring">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <label for="away_team_id" class="block font-medium text-sm text-gray-700">Away Team</label> <select id="away_team_id" name="away_team_id" class="block w-full px-4 py-2
                mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400
                @foreach($teams as $team)
                <option value=" {{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <label for="date" class="block font-medium text-sm text-gray-700">
                    Date</label>
                <input type="date" id="match_date" name="match_date" class="block w-full px-4 py-2 mt-2 text
                -gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:

                </label>

                <div class=" flex justify-end">
                <button type="submit" class="bg-green-500 mt-4 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded left-2">Save</button>
            </div>

    </div>
    <div>



</x-app-layout>