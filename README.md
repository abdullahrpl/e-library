# E-Library

E-Library adalah platform digital untuk mengelola koleksi buku, di mana pengguna dapat mencari, menambah, dan mengedit buku dalam koleksi. Sistem ini juga menyediakan fitur untuk pengguna terdaftar untuk mengelola profil mereka. E-Library dibangun menggunakan Laravel, dengan antarmuka pengguna berbasis HTML, CSS, dan JavaScript.

## Fitur

### 1. **Login dan Register**
   - Pengguna dapat mendaftar dan login untuk mengakses fitur pribadi.
   - Terdapat dua jenis pengguna: **admin** dan **user biasa**.
   - Admin dapat mengelola seluruh konten buku dan data pengguna.

### 2. **Dashboard**
   - Pengguna dapat melihat koleksi buku yang tersedia.
   - Admin memiliki kontrol penuh untuk menambah, menghapus, atau mengedit buku yang ada.

### 3. **Pengaturan (Fitur dalam Pengembangan)**
   - Pengguna dapat mengatur preferensi akun mereka, seperti mengganti password atau mengedit informasi profil.
   - **Fitur ini masih dalam pengembangan** dan akan segera tersedia pada versi berikutnya.

### 4. **Pencarian Buku**
   - Pengguna dapat mencari buku berdasarkan judul atau kategori.
   - **Fitur ini sedang dalam pengembangan** untuk meningkatkan pencarian yang lebih spesifik dengan berbagai filter.

### 5. **Filter Buku**
   - Pengguna dapat menyaring buku berdasarkan kategori atau tag yang relevan.
   - **Fitur ini sedang dalam pengembangan** dan akan segera diluncurkan.

### 6. **Edit Profil**
   - Pengguna dapat memperbarui informasi profil mereka.
   - **Fitur ini sudah tersedia**, namun masih ada beberapa pengembangan yang perlu dilakukan untuk mendukung fitur lebih lanjut, seperti upload foto profil.

## Teknologi yang Digunakan
- **Backend**: Laravel
- **Frontend**: HTML, CSS (TailwindCSS), JavaScript (SweetAlert, jQuery)
- **Database**: MySQL
- **Authentication**: Laravel Passport untuk API, Laravel Auth untuk session-based authentication
- **Fitur UI**: SweetAlert2 untuk konfirmasi dan error messages

## Cara Menjalankan Proyek

1. **Clone Repository**
   ```bash
   git clone https://github.com/abdullahrpl/e-library.git

2. **Instalasi Dependensi**
   Pindah ke direktori proyek dan jalankan perintah berikut untuk menginstal dependensi:
   ```bash
   cd e-library
   composer install
   npm install

3. **Konfigurasi .env**
   Salin file .env.example ke .env:
   ```bash
   cp .env.example .env
     
4. **Migrasi Database**
   Jalankan migrasi untuk membuat tabel-tabel yang dibutuhkan:
   ```bash
   php artisan migrate
   
5. **Jalankan Seeder**
   Jalankan seeder untuk mengisi data awal user admin
   ```bash
   php artisan db:seed

5. **Jalankan Server**
   Jalankan server untuk memulai melihat web dan berkreasi:
   ```bash
   php artisan serve
   
   
   
