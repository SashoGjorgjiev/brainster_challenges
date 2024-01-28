<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-b-2">
            <h1>Teams</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                    @if (auth()->check() && auth()->user()->is_admin == '1')
                    <div class="flex justify-end">
                        <a href="{{ route('teams.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white
                font-bold py-2 px-4 rounded">Add a new Team</a>
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
                                <th>Year Founded</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($teams as $team)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->year_of_foundation }}</td>
                                <td>
                                    <form method="GET" action="{{ route('teams.edit', $team) }}">
                                        @csrf
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 ">
                                            Edit Team </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('teams.destroy', $team) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4">
                                            Delete Team
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