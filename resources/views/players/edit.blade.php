<x-app-layout>
    <div class="container mx-auto mt-8 p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Player</h2>

        <form method="POST" action="{{ route('players.update', $player) }}" class="max-w-md mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="first_name" name="first_name" value="{{ $player->first_name }}" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="last_name" name="last_name" value="{{ $player->last_name }}" required>
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="block text-sm font-medium text-gray-600">Date of Birth</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="date_of_birth" name="date_of_birth" value="{{ $player->date_of_birth }}" required>
            </div>

            <div class="mb-4">
                <label for="team_id" class="block text-sm font-medium text-gray-600">Team</label>
                <select class="mt-1 p-2 w-full border rounded-md" id="team_id" name="team_id" required>
                    @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Player</button>
        </form>
    </div>
</x-app-layout>