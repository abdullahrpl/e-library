@extends('layouts.app')

@section('content')
    <main class="mt-[100px]">
        <div class="p-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Dashboard E-Library</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <p class="text-sm font-medium text-gray-500 mb-2">Total Buku</p>
                    <div class="text-3xl font-bold">{{$totalbuku}}</div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <p class="text-sm font-medium text-gray-500 mb-2">Buku Dipinjam</p>
                    <div class="text-3xl font-bold">145</div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <p class="text-sm font-medium text-gray-500 mb-2">User</p>
                    <div class="text-3xl font-bold">{{$totaluser}}</div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Daftar Buku</h2>
                </div>
                <div class="p-6">
                    <div class="table-container">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="justify-between">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Judul</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Penulis</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Penerbit</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tahun Terbit</th>
                                </tr>
                            </thead>
                            <tbody class="text-center bg-white divide-y divide-gray-200">
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $book->judulbuku }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->penulis }}</td>
                                        <td class="px-6 py-4 max-w-xs truncate">{{ $book->publisher }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->tahunterbit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
