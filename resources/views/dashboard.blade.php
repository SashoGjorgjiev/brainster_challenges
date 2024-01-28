<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border mt-4">
            <h1 class="text-2xl font-semibold leading-6 text-gray-900 my-4 border border-gray-200 rounded">Matches</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                    @if (auth()->check() && auth()->user()->is_admin == '1')
                    <div class="flex justify-end">
                        <a href="{{ route('matches.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white
                font-bold py-2 px-4 rounded">Add Match</a>
                    </div>
                    @endif
                    @endauth

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>Team1</th>
                                <th>Team2</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matches as $match)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $match->homeTeam->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $match->awayTeam->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $match->home_team_score }} - {{ $match->away_team_score }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>