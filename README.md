<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Frontend PBF - 230202016

Repositori ini adalah proyek frontend untuk mata kuliah **Pemrograman Berbasis Framework (PBF)**. Aplikasi ini digunakan untuk mengelola data Mata Kuliah (CRUD) yang terhubung ke REST API berbasis Laravel atau backend lainnya di `http://localhost:8080/matkul`.

---

## 🎯 Fitur Utama

- Menampilkan daftar Mata Kuliah
- Menambahkan data Mata Kuliah
- Mengedit data Mata Kuliah
- Menghapus data Mata Kuliah
- Menggunakan Bootstrap & DataTables
- Terintegrasi dengan REST API lokal

---

## 🚀 Cara Menjalankan Aplikasi

### 1. Clone Repositori

```bash
git clone https://github.com/rifai346/frontend-pbf-230202016.git
cd frontend-pbf-230202016
```

### 2. (Opsional) Jika menggunakan npm/Vite:

```bash
npm install
npm run dev
```

> Jika hanya menggunakan Blade dan tidak ada Vue/React, langkah ini bisa dilewati.

### 3. Jalankan Backend API

Pastikan backend yang menyediakan endpoint `http://localhost:8080/matkul` sudah aktif (Laravel/Node.js/Express).

---

## 📂 Struktur Proyek (Ringkasan)

```
frontend-pbf-230202016/
├── app/Http/Controllers/
│   └── matkulController.php
├── resources/views/matkul/
│   └── index.blade.php
├── routes/
│   └── web.php
├── public/
│   └── (asset statis seperti CSS & JS)
└── README.md
```

---

## 🌐 API Endpoint

Aplikasi ini berinteraksi dengan endpoint berikut:

| Method | Endpoint                     | Deskripsi           |
|--------|------------------------------|----------------------|
| GET    | `/matkul`                    | Menampilkan data    |
| POST   | `/matkul`                    | Menambah data       |
| PUT    | `/matkul/{id}`               | Memperbarui data    |
| DELETE | `/matkul/{id}`               | Menghapus data      |

> Pastikan backend berjalan di `http://localhost:8080`

---

## 👤 Identitas

- **Nama:** Muhammad Rifai  
- **NIM:** 230202016  
- **Mata Kuliah:** Pemrograman Berbasis Framework (PBF)  

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan tugas akademik.
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
