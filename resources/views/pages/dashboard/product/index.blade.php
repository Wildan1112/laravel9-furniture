<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX Datatables
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '10%'
                    },
                    {
                        data: 'name',
                        name: 'name',

                    },
                    {
                        data: 'price',
                        name: 'price',

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    }
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('dashboard.product.create') }}"
                    class="px-4 py-2 font-bold text-white transition duration-300 bg-green-500 rounded shadow-lg hover:bg-green-700">+
                    Create Product
                </a>
            </div>
            <div class="mt-5 overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="stripe">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
