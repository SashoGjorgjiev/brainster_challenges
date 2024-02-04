<x-app-layout>
    <h1 class="text-3xl font-bold mb-6 text-center">Vehicle Dashboard</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('vehicles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 float-right">Create vehicle</a>
                <div class="card">
                    <div class="card-header">{{ __('Vehicles') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <table class="min-w-full divide-y divide-gray-200 ml-3" id="vehicles-table">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Model</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plate Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Insurance Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->brand }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->plate_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $vehicle->insurance_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('vehicles.edit', ['id' => $vehicle->id]) }}" class="bg-orange-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/vehicles')
                .then(response => response.json())
                .then(data => {
                    const vehiclesTable = document.getElementById('vehicles-table');
                    const tbody = vehiclesTable.querySelector('tbody');

                    tbody.innerHTML = '';

                    data.vehicles.forEach(vehicle => {
                        const row = `<tr>
                            <td class="px-6 py-4 whitespace-nowrap">${vehicle.brand}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${vehicle.model}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${vehicle.plate_number}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${vehicle.insurance_date}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/vehicles/edit/${vehicle.id}" class="bg-red-500 rounded text-white py-1 px-1 hover:underline">Edit</a>
                                <button class="bg-red-500 text-white ml-2 py-1 rounded px-1 hover:underline" onclick="deleteVehicle(${vehicle.id})">Delete</button>
                            </td>
                        </tr>`;
                        tbody.insertAdjacentHTML('beforeend', row);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });

        function deleteVehicle(vehicleId) {
            if (confirm('Are you sure you want to delete this vehicle?')) {
                fetch(`/api/vehicles/${vehicleId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        if (data.success) {
                            const deletedRow = document.getElementById(`vehicle-row-${vehicleId}`);
                            if (deletedRow) {
                                deletedRow.remove();
                                location.reload();
                            }

                        }
                    })
                    .catch(error => console.error('Error deleting vehicle:', error));
            }
        }
    </script>
</x-app-layout>