<x-app-layout>
    @if(session('success'))
    <div class="text-green-500">
        {{ session('success') }}
    </div>
    @endif
    <div class="bg-gray-500 p-4 mb-4">
        <h2 class="text-2xl font-semibold mb-2">Past Matches</h2>
        <ul class="list-disc ml-6">
            @foreach ($pastMatches as $match)
            <li class="mb-2">{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }} - Result: {{ $match->home_team_score }} - {{ $match->away_team_score }}</li>
            @auth
            @if (auth()->check() && auth()->user()->is_admin == '1')
            <a href="{{ route('matches.edit', $match) }}" class="bg-blue-500 text-white px-2 py-1 hover:underline">Edit</a>
            <form method="POST" action="{{ route('matches.destroy', $match) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class=" bg-red-500 text-white px-2 py-1 hover:underline">Delete</button>
            </form>
            @endif
            @endauth
            @endforeach
        </ul>
    </div>

    <div class="bg-gray-200 p-4">
        <h2 class="text-2xl font-semibold mb-2">Upcoming Matches</h2>
        <ul class="list-disc ml-6">
            @foreach ($upcomingMatches as $match)
            <li class="mb-2">{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }} - Date: {{ $match->match_date }}</li>
            @auth
            @if (auth()->check() && auth()->user()->is_admin == '1')
            <a href="{{ route('matches.edit', $match) }}" class="bg-blue-500 text-white px-2 py-1 hover:underline">Edit</a>
            <form method="POST" action="{{ route('matches.destroy', $match) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-1 hover:underline">Delete</button>
            </form>
            @endif
            @endauth
            @endforeach
        </ul>
    </div>
    </body>

    </html>

</x-app-layout>