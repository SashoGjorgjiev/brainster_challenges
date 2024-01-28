<x-app-layout>
    <div class="container mx-auto mt-8 p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Match</h2>

        <form method="POST" action="{{ route('matches.update', $match) }}" class="max-w-md mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="home_team_id" class="block text-sm font-medium text-gray-600">Home Team</label>
                <select id="home_team_id" name="home_team_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $match->home_team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="away_team_id" class="block text-sm font-medium text-gray-600">Away Team</label>
                <select id="away_team_id" name="away_team_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $match->away_team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="match_date" class="block text-sm font-medium text-gray-600">Match Date</label>
                <input type="date" id="match_date" name="match_date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring" value="{{ $match->match_date }}">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Match</button>
        </form>
    </div>
</x-app-layout>