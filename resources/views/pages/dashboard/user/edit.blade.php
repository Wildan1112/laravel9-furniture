<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User &raquo; {{ $item->name }} &raquo; Edit
        </h2>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-400 text-white font-bold rounded-t px-4 py-2">
                            There's Something Wrong!
                        </div>
                        <div class="border border-t-0 border-red-300 rounded-b bg-red-100 px-4 py-2 text-red-600">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <form action="{{ route('dashboard.user.update', $item->id) }}" method="post" class="w-full"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-slate-700 text-xs font-bold mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name') ?? $item->name }}"
                                class="block w-full bg-gray-200 text-slate-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-slate-700 text-xs font-bold mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') ?? $item->email }}"
                                class="block w-full bg-gray-200 text-slate-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide text-slate-700 text-xs font-bold mb-2">Roles</label>
                            <select name="roles" id=""
                                class="block w-full bg-gray-200 text-slate-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="{{ $item->roles }}">{{ $item->roles }}</option>
                                <option disabled value="">---------</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="USER">USER</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit"
                                class="px-4 py-2 shadow-lg text-white rounded bg-green-500 hover:bg-green-700 transition duration-300 rounded font-bold">Update
                                User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
