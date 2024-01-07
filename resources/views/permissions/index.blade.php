@extends('permission-editor::layouts.app')

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Permissions</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('permission-editor.permissions.create') }}"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto">
               <div class="flex space-x-1 items-center ">
                    <div class="w-5 h-5"><img class="w-full h-full" src="https://img.icons8.com/ios-glyphs/30/ffffff/plus--v1.png" alt="plus--v1" /></div>
                    <div class="text-white">Add Permission</div>
                </div>
            </a>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Name
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Roles
                            </th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($permissions as $permission)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $permission->name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">
                                    {{ $permission->roles->implode('name', ', ') }}
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('permission-editor.permissions.edit', $permission) }}"
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-cyan-500 px-4 py-1 text-sm font-medium text-white shadow-sm hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:w-auto">
                                       <div class="flex space-x-1 items-center">
                                            <div class="w-4 h-4"><img class="w-full h-full"
                                                    src="https://img.icons8.com/external-anggara-basic-outline-anggara-putra/24/ffffff/external-edit-user-interface-anggara-basic-outline-anggara-putra-5.png"
                                                    alt="external-edit-user-interface-anggara-basic-outline-anggara-putra-5" />
                                            </div>
                                            <div class="text-white">Edit</div>
                                        </div>
                                    </a>

                                    <form action="{{ route('permission-editor.permissions.destroy', $permission) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-1 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                                        >
                                            <div class="flex space-x-1 items-center">
                                                <div class="w-4 h-4"><img width="48" height="48"
                                                        src="https://img.icons8.com/fluency-systems-filled/48/ffffff/trash.png"
                                                        alt="trash" /></div>
                                                <div class="text-white">Delete</div>
                                            </div>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    No permissions found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
