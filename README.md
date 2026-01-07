# 🏢 Sistem Manajemen Kos Modern

Aplikasi web modern untuk mengelola kos dengan fitur lengkap berupa CRUD (Create, Read, Update, Delete) untuk kamar dan penghuni. Dibangun dengan **Laravel 11**, **Tailwind CSS**, dan **Laragon**.

## 🎨 Fitur

✅ **Dashboard Analytics**
- Statistik jumlah kamar total
- Kamar kosong dan terisi
- Total penghuni terdaftar
- Visualisasi grafik status kamar

✅ **Manajemen Kamar**
- Tambah kamar baru
- Edit data kamar
- Hapus kamar
- Tracking status kamar (Kosong/Terisi)

✅ **Manajemen Penghuni**
- Tambah penghuni baru
- Edit data penghuni
- Hapus penghuni
- Tracking tanggal masuk dan keluar
- Relasi dengan kamar yang ditempati

✅ **Authentikasi**
- Login system
- Session management
- Logout feature

✅ **Design Modern**
- Sidebar navigasi responsive
- Tema biru dan putih yang elegan
- Interface smooth dan user-friendly
- Tailwind CSS untuk styling

## 📋 Persyaratan

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL/MariaDB
- Laragon (untuk development di Windows)

## 🚀 Instalasi & Setup

### 1. Clone Repository
```bash
git clone <repository-url>
cd manajemen_kos
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_kos
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi & Seeding
```bash
php artisan migrate:fresh --seed
```

### 6. Build Assets
```bash
npm run build
# atau untuk development
npm run dev
```

### 7. Jalankan Server
```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

## 🔐 Akun Login Default

- **Email**: admin@kos.com
- **Password**: password123

## 📁 Struktur Folder

```
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php (Layout utama dengan sidebar)
│   ├── dashboard.blade.php
│   ├── kamar/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── penghuni/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   └── auth/
│       └── login.blade.php
├── css/
│   └── app.css
└── js/
    └── app.js

app/
├── Models/
│   ├── User.php
│   ├── Kamar.php
│   └── Penghuni.php
├── Http/
│   └── Controllers/
│       ├── DashboardController.php
│       ├── KamarController.php
│       └── PenghuniController.php

database/
├── migrations/
│   ├── create_users_table.php
│   ├── create_kamars_table.php
│   └── create_penghunis_table.php
└── seeders/
    └── DatabaseSeeder.php
```

## 🎯 Fitur Detail

### Dashboard
- Menampilkan statistik lengkap tentang kamar dan penghuni
- Progress bar visual untuk status kamar
- Quick actions untuk menambah kamar atau penghuni

### Kamar Management
- Tabel lengkap dengan sorting
- Kolom: Kode Kamar, Nama, Harga, Status
- Form validation yang ketat
- Soft delete untuk data history

### Penghuni Management  
- Tabel dengan pagination
- Kolom: Nama, No. HP, Kamar, Tgl Masuk, Tgl Keluar
- Validasi relasi kamar
- Auto-update status kamar saat penghuni ditambah/dihapus

## 🎨 Teknologi

- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL
- **Icons**: Font Awesome 6
- **Build Tool**: Vite
- **Server**: Laragon (PHP 8.x)

## 📝 API Routes

```
GET    /home                    - Dashboard
GET    /kamar                   - List kamar
GET    /kamar/create            - Form tambah kamar
POST   /kamar                   - Simpan kamar baru
GET    /kamar/{id}/edit         - Form edit kamar
PUT    /kamar/{id}              - Update kamar
DELETE /kamar/{id}              - Hapus kamar

GET    /penghuni                - List penghuni
GET    /penghuni/create         - Form tambah penghuni
POST   /penghuni                - Simpan penghuni baru
GET    /penghuni/{id}/edit      - Form edit penghuni
PUT    /penghuni/{id}           - Update penghuni
DELETE /penghuni/{id}           - Hapus penghuni

POST   /logout                  - Logout user
```

## 🔄 Database Schema

### Tabel: users
- id
- name
- email
- password
- remember_token
- timestamps

### Tabel: kamars
- id
- kode_kamar (unique)
- nama_kamar
- harga
- status (Kosong/Terisi)
- timestamps

### Tabel: penghunis
- id
- nama
- no_hp
- kamar_id (FK)
- tgl_masuk
- tgl_keluar (nullable)
- timestamps
- deleted_at (soft delete)

## 🎭 Validasi Data

### Kamar
- Kode kamar: Required, Unique
- Nama kamar: Required
- Harga: Required, Numeric
- Status: Required, Enum(Kosong/Terisi)

### Penghuni
- Nama: Required, String
- No. HP: Required, String
- Kamar: Required, Exists in kamars table
- Tgl Masuk: Required, Date
- Tgl Keluar: Optional, Date

## 🛠️ Troubleshooting

### Migrasi gagal
```bash
php artisan migrate:reset
php artisan migrate:fresh --seed
```

### Asset tidak tampil
```bash
npm run dev
# atau rebuild
npm run build
```

### Database tidak terkoneksi
- Pastikan MySQL/MariaDB berjalan
- Check konfigurasi `.env`
- Pastikan database sudah dibuat

## 📞 Support

Untuk bantuan lebih lanjut, silakan hubungi developer atau check dokumentasi Laravel resmi di https://laravel.com

## 📄 Lisensi

MIT License - Feel free to use this project!

---

**Dibuat dengan ❤️ untuk manajemen kos yang lebih baik**
