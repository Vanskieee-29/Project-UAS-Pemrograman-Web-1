# Project-UAS-Pemrograman-Web-1
- Nama: Askaria Davan Dafyanza
- NIM: 312410298
- Kelas: TI.24.A.2

#  GameStore Management System (PHP MVC)

Project ini adalah aplikasi berbasis web untuk manajemen katalog game yang dibangun menggunakan arsitektur **MVC (Model-View-Controller)** murni. Dibuat untuk memenuhi tugas besar Pemrograman Web.

##  Fitur Utama
- **Multi-user Role**: Pembedaan hak akses antara Admin dan User.
- **Secure Authentication**: Password tersimpan dalam bentuk Hash (BCRYPT).
- **Interactive CRUD**: Tambah, Edit, dan Hapus data dengan feedback Flasher.
- **Search & Pagination**: Pencarian data game dan pembagian halaman yang rapi.
- **Clean URL**: Menggunakan `.htaccess` untuk navigasi URL yang lebih user-friendly.

##  Teknologi yang Digunakan
- **Bahasa**: PHP 8.x
- **Database**: MySQL
- **Frontend**: Bootstrap 5, JQuery
- **Arsitektur**: Custom MVC Framework

##  Struktur Folder Utama
- `app/controllers/` : Logika alur program (Auth, Home).
- `app/models/` : Berinteraksi langsung dengan database (Game_model, User_model).
- `app/views/` : Tampilan antarmuka pengguna.
- `app/core/` : File inti framework (App, Database, Controller, Flasher).
- `public/` : Aset publik (CSS, JS, Gambar) dan file `index.php` utama.

##  Akun Demo
| Role  | Username    | Password |
|-------|-------------|----------|
| Admin | admin_uas   | admin123 |
| User  | user_biasa  | user123  |

##  Cara Instalasi
1. Clone repository ini.
2. Import file database `.sql` ke phpMyAdmin.
3. Sesuaikan konfigurasi database di `app/config/config.php`.
4. Jalankan pada server lokal (XAMPP/Laragon).

## DEMO APLIKASI

## Form Login
<img width="1920" height="1200" alt="Form Login" src="https://github.com/user-attachments/assets/7855f3b0-cfdc-46bc-8f48-cf3f13a47577" />

## Login sebagai admin
<img width="1920" height="1200" alt="Login sebagai admin" src="https://github.com/user-attachments/assets/de8efd25-1a45-4417-bf34-cc5878ff0b79" />

## Tambah
<img width="1920" height="1200" alt="Tambah" src="https://github.com/user-attachments/assets/d97f9f5c-43d4-42b5-abfa-737db7bd9b33" />

## Hapus
<img width="1920" height="1200" alt="Hapus" src="https://github.com/user-attachments/assets/61ffd429-e138-4537-b871-9b634ca799f4" />

## Edit
<img width="1920" height="1200" alt="Edit" src="https://github.com/user-attachments/assets/b06b31e5-6159-4ba4-9f30-acb81729977f" />

## Halaman kedua (menggunakan tombol pagination)
<img width="1920" height="1200" alt="Halaman kedua" src="https://github.com/user-attachments/assets/bd306ec4-7f07-45fc-ba91-bd9ab1b35706" />

## Fitur Pencarian
<img width="1920" height="1200" alt="Pencarian" src="https://github.com/user-attachments/assets/91790409-8589-44f0-bcc9-0d2631cab946" />

## Login sebagai user
<img width="1920" height="1200" alt="Login sebagai user" src="https://github.com/user-attachments/assets/df7489d3-2097-4521-833a-86627075ece1" />
