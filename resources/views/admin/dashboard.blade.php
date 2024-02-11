<x-app-layout>


    <div class="py-12">

        <button id="createUserButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create a new user</button>

        <div class="container mx-auto p-4  text-white">
            <table class="min-w-full bg-gray-800 border border-gray-700">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">User Type </th>
                    </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>
        <div id="userModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75"></div>

            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <h1 class="text-2xl font-semibold mb-4">Create User</h1>

                    <form id="createUserForm">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            const createButton = $('#createUserButton');
            const modal = $('#userModal');
            const closeModal = $('.modal-overlay');
            const tableBody = $('table tbody');
            const createUserForm = $('#createUserForm');

            createButton.click(function() {
                modal.removeClass('hidden');
            });

            closeModal.click(function() {
                modal.addClass('hidden');
            });

            createUserForm.submit(function(e) {
                e.preventDefault();

                const formData = new FormData(createUserForm[0]);
                console.log('Form Data:', formData);

                axios.post('/api/users', formData)
                    .then(function(response) {
                        modal.addClass('hidden');
                        console.log('Response:', response);

                        alert(response.data.message);
                    })
                    .catch(function(error) {
                        console.error('Error creating user:', error);
                        alert('An error occurred while creating the user.');
                    });
            });

            function getUsers() {
                axios.get('/api/users')
                    .then(function(response) {
                        const users = response.data;
                        console.log(response);
                        tableBody.empty();

                        $.each(users, function(index, user) {
                            const deactivateButton = user.is_active ?
                                `<button class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded deactivateButton" data-id=${user.id}>Deactivate</button>` :
                                '';

                            const row = `
                    <tr>
                        <td class="px-4 py-2 text-center">${user.id}</td>
                        <td class="px-4 py-2 text-center">${user.name}</td>
                        <td class="px-4 py-2 text-center">${user.email}</td>
                        <td class="px-4 py-2 text-center">${user.type}</td>
                        <td class="px-4 py-2 text-left">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded deleteButton" data-id=${user.id}>Delete</button>
                            ${deactivateButton}
                        </td>
                    </tr>
                `;

                            tableBody.append(row);
                        });
                    })
                    .catch(function(error) {
                        console.error('Error fetching user data:', error);
                    });
            }

            getUsers();
            tableBody.on('click', '.deleteButton', function() {
                const userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    axios.delete(`/api/users/${userId}`)
                        .then(function(response) {
                            alert(response.data.message);
                            getUsers();
                        })
                        .catch(function(error) {
                            console.error('Error deleting user:', error);
                            alert('An error occurred while deleting the user.');
                        });
                }
            });

            tableBody.on('click', '.deactivateButton', function() {
                const userId = $(this).data('id');
                if (confirm('Are you sure you want to deactivate this user?')) {
                    axios.patch(`/api/users/${userId}`)
                        .then(function(response) {
                            alert(response.data.message);
                            getUsers();
                        })
                        .catch(function(error) {
                            console.error('Error deactivating user:', error);
                            alert('An error occurred while deactivating the user.');
                        });
                }
            });
        });
    </script>

</x-app-layout>