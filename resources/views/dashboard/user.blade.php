@extends('layouts.user')

@section('content')
    @php use Carbon\Carbon; @endphp
    <div class="container mx-auto px-4 pt-24 pb-12">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 font-[Quicksand]">Katalog Buku</h1>
                <p class="text-gray-600 mt-1">Temukan buku-buku terbaik untuk dibaca</p>
            </div>

            <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                <div class="relative">
                    <select
                        class="pl-3 pr-10 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                        <option>Semua Kategori</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Pendidikan</option>
                        <option>Sejarah</option>
                        <option>Teknologi</option>
                    </select>
                </div>

                <div class="relative">
                    <select
                        class="pl-3 pr-10 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                        <option>Terbaru</option>
                        <option>Terpopuler</option>
                        <option>A-Z</option>
                        <option>Z-A</option>
                    </select>
                </div>

                <button
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm flex items-center gap-2">
                    <i class="fa fa-filter"></i>
                    <span>Filter</span>
                </button>
            </div>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Book Card 1 -->

            @forelse ($books as $book)
                <div
                    class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md capitalize transition-all transform hover:scale-105 duration-200">
                    @if (Carbon::parse($book->created_at)->diffInDays(now()) < 2)
                        <div class=" absolute bg-green-600 text-white text-xs px-2 text-center py-1 rounded-full shadow">
                            Baru!
                        </div>
                    @endif
                    <div class="h-56 overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $book->coverbuku) }}" alt=""
                            class="w-[200px] h-[300px] object-cover rounded-lg mx-auto">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $book->judulbuku }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $book->penulis }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <i class="fa fa-calendar-alt mr-1"></i>
                                {{ $book->tahunterbit }}
                            </span>
                            <span class="mx-2">•</span>
                            <span class="flex items-center capitalize">
                                <i class="fa fa-book mr-1"></i>
                                {{ $book->kategori }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-green-600">Tersedia</span>
                            @guest
                                <button onclick="showLoginAlert()"
                                    class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700">
                                    Lihat Detail
                                </button>
                            @else
                                <a href="{{ route('userbook', $book->id) }}"
                                    class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700">
                                    Lihat Detail
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    <img src="https://img.freepik.com/free-vector/detective-following-footprints-concept-illustration_114360-21835.jpg?semt=ais_hybrid&w=740"
                        alt="No Books" class="w-40 mx-auto mb-4">
                    <p class="text-lg font-semibold">Belum ada buku yang tersedia</p>
                    <p class="text-sm text-gray-400">Silakan cek kembali nanti ya!</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <a href="#" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fa fa-chevron-left text-xs"></i>
                    </a>
                    <a href="#" class="px-3 py-2 rounded-md bg-indigo-600 text-white">1</a>
                    <a href="#" class="px-3 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">2</a>
                    <a href="#" class="px-3 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">3</a>
                    <span class="px-3 py-2 text-gray-500">...</span>
                    <a href="#" class="px-3 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">8</a>
                    <a href="#" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fa fa-chevron-right text-xs"></i>
                    </a>
                </nav>
            </div> --}}
    </div>
@endsection
