<x-app-layout>
    <div class="container mx-auto mt-8 p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Team</h2>

        <form method="POST" action="{{ route('teams.update', $team) }}" class="max-w-md mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="name" name="name" value="{{ $team->name }}">
            </div>

            <div class="mb-4">
                <label for="year_of_foundation" class="block text-sm font-medium text-gray-600">Year Founded</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="year_of_foundation" name="year_of_foundation" value="{{ $team->year_of_foundation }}">
            </div>


            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Team</button>
        </form>
    </div>
</x-app-layout>