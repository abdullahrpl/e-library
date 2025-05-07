@extends('layouts.auth')

@section('content')
    <div class="max-w-md w-full mx-auto p-6">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 text-white rounded-full mb-4">
                <i class="fa fa-book text-2xl"></i>
            </div>

            @if (request()->routeIs('admin'))
            <h1 class="text-3xl font-bold text-gray-800">ADMIN</h1>
            <p class="text-gray-600 mt-2">Masuk ke akun ADMIN Anda</p> 
            @else
            <h1 class="text-3xl font-bold text-gray-800">E-Library</h1>
            <p class="text-gray-600 mt-2">Masuk ke akun Anda</p>
            @endif
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{route('login')}}" method="POST" class="space-y-6">
            @csrf
                <!-- Email/Username Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-500"></i>
                        </div>
                        <input id="username" name="username" type="text" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Masukkan username">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Lupa password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-lock text-gray-500"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Masukkan password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="togglePassword" class="text-gray-500 focus:outline-none">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Masuk
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
                        <span class="px-2 bg-white text-gray-500">Atau masuk dengan</span>
                    </div>
                </div>

                <!-- Social Login -->
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

        <!-- Register Link -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{route('register.show')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar sekarang</a>
            </p>
        </div>
    </div>
@endsection