@extends('layouts.auth')

@section('content')
    <div class="max-w-lg w-full mx-auto p-6">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 text-white rounded-full mb-4">
                <i class="fa fa-book text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">E-Library</h1>
            <p class="text-gray-600 mt-2">Buat akun baru</p>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
        <!-- Register Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-envelope text-gray-500"></i>
                        </div>
                        <input id="email" name="email" type="email" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Alamat email" name="email">
                    </div>
                </div>

                <!-- Username Field -->
                <div class="space-y-2">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-500"></i>
                        </div>
                        <input id="username" name="username" type="text" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Username" name="username">
                    </div>
                </div>

                <!-- Password Fields -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-lock text-gray-500"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Password" name="password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="togglePassword" class="text-gray-500 focus:outline-none">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700">
                            Saya menyetujui <a href="#" class="text-indigo-600 hover:text-indigo-500">Syarat dan
                                Ketentuan</a> serta <a href="#"
                                class="text-indigo-600 hover:text-indigo-500">Kebijakan Privasi</a>
                        </label>
                    </div>
                </div>

                <!-- Register Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Daftar
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Atau daftar dengan</span>
                    </div>
                </div>

                <!-- Social Register -->
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <a href="#"
                        class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fa fa-google text-red-500 mr-2"></i>
                        Google
                    </a>
                    <a href="#"
                        class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fa fa-facebook text-blue-600 mr-2"></i>
                        Facebook
                    </a>
                </div>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login.show') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk
                    sekarang</a>
            </p>
        </div>
    </div>
@endsection
