@extends('layouts.app')

@section('content')
    <main class="mt-[50px]">
        <div class="p-8">
            <div class="flex items-center mb-8">
                <a href="{{redirect()->getUrlGenerator()->previous()}}" class="mr-4 p-2 rounded-full hover:bg-gray-200"><i
                        class="fa fa-arrow-left text-sm"></i></a>
                <h1 class="text-3xl font-bold text-gray-800">Detail Buku</h1>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Book Cover -->
                    <div class="md:col-span-1 p-6">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm">
                            <img src="{{ asset('storage/' . $book->coverbuku) }}" class="w-[200px] h-[300px] object-cover rounded-lg mx-auto">
                            {{-- @if ($book->cover)
                                <img src="{{ asset('storage/covers/'.$book->cover) }}" class="book-cover w-full">
                            @else
                                <p>ga ada cover</p>
                            @endif --}}
                        </div>
                        <div class="mt-6 flex flex-col space-y-4">
                            <button
                                class="w-full px-4 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 flex items-center justify-center gap-2">
                                <i class="fas fa-book-reader"></i>
                                <span>Pinjam Buku</span>
                            </button>

                            <div class="flex space-x-2">
                                <button
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 flex items-center justify-center gap-2">
                                    <i class="fa fa-heart text-red-500"></i>
                                    <span>Favorit</span>
                                </button>
                                <button
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 flex items-center justify-center gap-2">
                                    <i class="fa fa-share-alt text-indigo-500"></i>
                                    <span>Bagikan</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Details -->
                    <div class="md:col-span-2 p-6">
                        <span class="flex text-md items-center mb-[10px] text-gray-500 uppercase">{{$book->kategori}}</span>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2 uppercase">{{$book->judulbuku}}</h2>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="flex items-center"><i class="fa fa-user mr-1"></i> {{$book->penulis}}</span>
                            <span class="mx-2">•</span>
                            <span class="flex items-center"><i class="fa fa-calendar mr-1"></i> {{$book->tahunterbit}}</span>
                            <span class="mx-2">•</span>
                            <span class="flex items-center"><i class="fa fa-building mr-1"></i> {{$book->publisher}}</span>
                        </div>

                        <div class="flex items-center mb-6">
                            <div class="flex items-center text-yellow-400">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-alt"></i>
                            </div>
                            <span class="ml-2 text-gray-600">4.5/5 (120 ulasan)</span>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Deskripsi</h3>
                            <p class="text-gray-700 leading-relaxed">
                              {{$book->deskripsi}}
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-medium mb-4">Informasi Detail</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Judul</span>
                                        <span class="font-medium">{{$book->judulbuku}}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Penulis</span>
                                        <span class="font-medium">{{$book->penulis}}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Penerbit</span>
                                        <span class="font-medium">{{$book->publisher}}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Tahun Terbit</span>
                                        <span class="font-medium">{{$book->tahunterbit}}</span>
                                    </div>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Jumlah Halaman</span>
                                        <span class="font-medium">{{$book->jumlahhalaman}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- stok --}}
                        {{-- <div class="border-t border-gray-200 pt-6 mt-6">
                            <h3 class="text-lg font-medium mb-4">Status Ketersediaan</h3>
                            <div class="bg-indigo-50 p-4 rounded-md flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-indigo-700">Tersedia: 3 dari 5 buku</p>
                                    <p class="text-sm text-gray-600 mt-1">Terakhir dipinjam: 2 hari yang lalu</p>
                                </div>
                                <div class="text-indigo-600">
                                    <i class="fas fa-book-open text-2xl"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Related Books Section -->
            {{-- <div class="mt-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Buku Terkait</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Sang Pemimpi" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-medium text-gray-800">Sang Pemimpi</h3>
                            <p class="text-sm text-gray-500">Andrea Hirata</p>
                            <div class="mt-2 flex justify-between items-center">
                                <span class="text-xs text-gray-600">2006</span>
                                <a href="#" class="text-indigo-600 text-sm hover:underline">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
