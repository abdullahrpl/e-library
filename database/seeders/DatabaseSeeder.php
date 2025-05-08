<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);

        Book::create([
            'judulbuku' => 'Ini Kemana?',
            'penulis' => 'Abdullah',
            'publisher' => 'Abdullah Co.',
            'tahunterbit' => 2024,
            'deskripsi' => 'Tentang seseorang yang menelusuri sebuah jalan yang tidak tahu akan menuju kemana, berakhir dimana, apakah ada akhirnya?.',
            'jumlahhalaman' => 350,
            'coverbuku' => 'cover2.png',
            'kategori' => 'Fiksi'
        ]);

        Book::create([
            'judulbuku' => 'Rumah',
            'penulis' => 'Abdullah',
            'publisher' => 'Abdullah Co.',
            'tahunterbit' => 2023,
            'deskripsi' => 'Terkadang rumah bukanlah tempat terbaik untuk mengistirahatkan lelah, peluh atau mungkin untuk menenangkan diri.',
            'jumlahhalaman' => 250,
            'coverbuku' => 'cover3.png',
            'kategori' => 'Fiksi'
        ]);
    }
}
