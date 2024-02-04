<x-app-layout>
    <div class="container-fluid">
        <h1>Edit Vehicle</h1>
        <form action="{{ route('vehicles.update', ['vehicle' => $vehicle]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="brand" class="block text-gray-600 text-sm font-semibold mb-2">Brand:</label>
                <input type="text" name="brand" id="brand" class="border w-full p-2" value="{{ $vehicle->brand }}">
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-600 text-sm font-semibold mb-2">Model:</label>
                <input type="text" name="model" id="model" class="border w-full p-2" value="{{ $vehicle->model }}">
            </div>

            <div class="mb-4">
                <label for="plate_number" class="block text-gray-600 text-sm font-semibold mb-2">Plate Number:</label>
                <input type="text" name="plate_number" id="plate_number" class="border w-full p-2" value="{{ $vehicle->plate_number }}">
            </div>

            <div class="mb-4">
                <label for="insurance_date" class="block text-gray-600 text-sm font-semibold mb-2">Insurance Date:</label>
                <input type="date" name="insurance_date" id="insurance_date" class="border w-full p-2" value="{{ $vehicle->insurance_date }}">
            </div>

            <div>
                <button type="submit" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>