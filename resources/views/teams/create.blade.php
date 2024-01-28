<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border mt-4">
        <h1 class="text-2xl font-semibold leading-6 text-gray-900 my-4 border border-gray-200 rounded">Create a new match</h1>
        <form method="POST" action="{{ route('teams.store') }}">
            @csrf
            <div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline
    -none focus:shadow-outline" id="name" type="text" placeholder="Team Name" name="name">
                </div>
                <div class="mb-4">
                    <label for="year_of_foundation" class="block text-gray-700 text-sm font-bold mb-2">Year Founded</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:
                        outline-none focus:shadow-outline" id="year_of_foundation" type="number" placeholder="YYYY" name="year_of_foundation">
                </div>


                <div class=" flex ">
                    <button type="submit" class="bg-green-500 my-4 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded left-2">Save</button>
                </div>

            </div>
            <div>



</x-app-layout>