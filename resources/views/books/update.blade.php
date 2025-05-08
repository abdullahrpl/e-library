@extends('layouts.app')

@section('content')
    <main class="main-content content-area">
        <div class="p-8">
            <div class="flex items-center mb-8">
                <a href="{{redirect()->getUrlGenerator()->previous()}}" class="mr-4 p-2 rounded-full hover:bg-gray-200">
                    <i class="fa fa-arrow-left text-sm"></i>
                </a>
                <h1 class="text-3xl font-bold text-gray-800">Update Buku</h1>
            </div>

            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Informasi Buku</h2>
                    <p class="text-sm text-gray-500 mt-1">Masukkan informasi lengkap tentang buku yang akan di edit.</p>
                </div>
                <div class="p-6">
                    <form class="space-y-6" action="{{route('books.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                                <input id="title" type="text" placeholder="Masukkan judul buku baru" name="judulbuku" value="{{$data->judulbuku}}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div class="space-y-2">
                                <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                                <input id="author" type="text" placeholder="Masukkan nama penulis baru" name="penulis" value="{{$data->penulis}}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div class="space-y-2">
                                <label for="publisher" class="block text-sm font-medium text-gray-700">Penerbit</label>
                                <input id="publisher" type="text" placeholder="Masukkan nama penerbit baru" name="penerbit" value="{{$data->publisher}}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div class="space-y-2">
                                <label for="year" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                                <input id="year" type="number" placeholder="Masukkan tahun terbit baru" name="tahunterbit" value="{{$data->tahunterbit}}" min="1000" max="{{date('Y')}}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div class="space-y-2">
                                <label for="isbn" class="block text-sm font-medium text-gray-700">Halaman Buku</label>
                                <input id="jumlahhalaman" type="number" placeholder="Masukkan jumlah halaman Baru" value="{{$data->jumlahhalaman}}"
                                    name="jumlahhalaman" pattern="\d{1,4}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div class="space-y-2">
                                <label for="category" class="block text-sm font-medium text-gray-700">Kategori Buku<span class=" text-red-500">*</span></label>
                                <select id="category" name="kategori"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="">Pilih kategori</option>
                                    <option value="fiksi">Fiksi</option>
                                    <option value="non-fiksi">Non-Fiksi</option>
                                    <option value="sains">Sains</option>
                                    <option value="teknologi">Teknologi</option>
                                    <option value="sejarah">Sejarah</option>
                                    <option value="biografi">Biografi</option>
                                    <option value="pendidikan">Pendidikan</option>
                                </select>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea id="description" rows="4" placeholder="Masukkan deskripsi baru" name="deskripsi"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{$data->deskripsi}}</textarea>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium mb-4">Masukkan Cover Baru</h3>
                            <div class="flex items-center space-x-6">
                                <div
                                    class="w-32 h-32 bg-gray-100 rounded-md border border-gray-300 flex items-center justify-center overflow-hidden">
                                    <img id="preview" src="#" alt="Preview"
                                        class="hidden w-full h-full object-cover" />
                                    <i id="icon-placeholder" class="fa fa-image text-gray-400 text-4xl"></i>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <label for="cover"
                                            class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-50 cursor-pointer">
                                            <span class="text-sm">Pilih File</span>
                                            <input id="cover" name="coverbuku" type="file" class="hidden"
                                                accept="image/*">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">Format: JPG, PNG. Ukuran maksimal: 2MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a type="button" href="{{ redirect()->getUrlGenerator()->previous() }}"
                                class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan
                                Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
