<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-b-2">
            <h1>Players</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- check for Auth::check() -->
                    @auth
                    @if (auth()->check() && auth()->user()->is_admin == '1')
                    <div class="flex justify-end">
                        <a href="{{ route('players.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white
                font-bold py-2 px-4 rounded">Add a new Player</a>
                    </div>
                    @endif
                    @endauth
                    @if(session('success'))
                    <div class="text-green-500">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Team</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($players as $player)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $player->first_name . ' ' .  $player->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $player->date_of_birth}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ optional($player->team)->name }}
                                </td>
                                <td>
                                    <form method="GET" action="{{ route('players.edit', $player) }}">
                                        @csrf
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 ">
                                            Edit player </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('players.destroy', $player) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-danger-600 text-white py-2 px-4">
                                            Delete Player
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>