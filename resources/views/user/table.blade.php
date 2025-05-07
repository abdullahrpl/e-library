@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-sm mt-[100px]">
        <div class="p-6 border-b border-gray-200 flex justify-between w-full">
            <h2 class="text-lg font-medium">Daftar User</h2>
        </div>
        @if (session('success'))
            <div id="notif-box" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="p-6">
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="text-center">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $user->username }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 max-w-xs truncate">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center space-x-2">
                                        <form action="{{ route('books.destroyuser', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-sm bg-red-50 text-red-700 border border-red-300 rounded-md hover:bg-red-100">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection