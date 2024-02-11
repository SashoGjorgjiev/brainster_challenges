<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p>This verification link has expired. Click the button below to generate a new link.</p>
                <form action="{{ route('generate-new-link', ['email' => $user->email]) }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Generate New Link</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>