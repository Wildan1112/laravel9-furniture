<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product &raquo; {{ $product->name }} &raquo; Gallery
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
                        data: 'products_id',
                        name: 'products_id',
                        width: '15%'
                    },
                    {
                        data: 'url',
                        url: 'url'
                    },
                    {
                        data: 'is_featured',
                        name: 'is_featured'
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('dashboard.product.gallery.create', $product->id) }}"
                    class="font-bold px-4 py-2 shadow-lg text-white rounded bg-green-500 hover:bg-green-700 transition duration-300">+
                    Add Photos
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md mt-5">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Photo</th>
                                <th>Featured</th>
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
