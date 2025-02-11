# Project Laravel SPA dengan jQuery AJAX

## 📌 Deskripsi

Ini adalah project CRUD menggunakan Laravel dengan konsep SPA (Single Page Application) menggunakan jQuery AJAX. Project ini berfokus pada pengelolaan data penjualan dengan tampilan yang sederhana tetapi modern menggunakan Tailwind CSS.

## 🚀 Instalasi

Ikuti langkah-langkah berikut untuk menginstall dan menjalankan project ini secara lokal:

### 1. Clone Repository
```sh
git clone [https://github.com/kuramocheez/laravel-spa.git](https://github.com/kuramocheez/laravel-spa.git)
cd laravel-spa
```

### 2. Install Dependencies
```sh
composer install
npm install
```

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```sh
cp .env.example .env
```
Kemudian atur variabel konfigurasi seperti berikut:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key
```sh
php artisan key:generate
```

### 5. Migrasi Database dan Seeder
```sh
php artisan migrate --seed
```

### 6. Jalankan Server
```sh
php artisan serve
```

## 📌 Fitur
- Laravel 11
- CRUD Data Penjualan
- Menggunakan jQuery AJAX untuk SPA
- UI sederhana dan modern dengan Tailwind CSS



💡 **Catatan:** Jika ada kendala dalam proses instalasi atau konfigurasi, pastikan semua dependensi telah diinstal dengan benar.

