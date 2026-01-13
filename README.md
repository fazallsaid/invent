# GudangKu - Aesthetic Inventory Management System

Web aplikasi manajemen inventaris modern yang dibangun dengan **Laravel**, didesain untuk memenuhi standar estetika tinggi dan persyaratan tugas akhir (Authorization Using Policy).

---

## 📋 Compliance & Requirement Report
Berikut adalah laporan pemenuhan syarat berdasarkan dokumen `18.AuthorizationMenggunakanPolicy.pdf` dan `14.SoalProyekAkhir.pdf`:

### 1. Authorization Menggunakan Policy ✅
Fitur ini **sudah diimplementasikan** sepenuhnya menggunakan Laravel Policy.
- **Konsep**: Hak akses dibedakan berdasarkan Role (`admin` vs `staff`).
- **Implementasi**: 
    - `ProductPolicy`: Mengatur siapa yang boleh create/update/delete produk.
    - `CategoryPolicy`: Mengatur siapa yang boleh create/update/delete kategori.
- **Bukti**: 
    - Login sebagai **Admin** -> Bisa akses semua tombol (Tambah/Edit/Hapus).
    - Login sebagai **Staff** -> Tombol aksi disembunyikan otomatis oleh Blade directive `@can`.
    - Akses Paksa URL -> Dicegah oleh controller `authorizeResource` (Return 403 Forbidden).

### 2. CRUD Functionality ✅
- **Create**: Bisa membuat Produk dan Kategori baru (dengan validasi input).
- **Read**: Menampilkan data dalam tabel estetik dengan pagination/list.
- **Update**: Bisa mengedit data yang ada (Admin only).
- **Delete**: Bisa menghapus data dengan konfirmasi (Admin only).

### 3. Aesthetic UI/UX (Bonus) ✨
- **Glassmorphism**: Desain kartu transparan yang kekinian.
- **Responsive Sidebar**: Layout dashboard yang menyesuaikan layar (Desktop/Mobile).
- **Interactive**: Efek hover, focus ring, dan animasi smooth.

---

## 🚀 Fitur Utama

### 1. Dashboard Interaktif
Halaman utama yang menyambut user dengan statistik ringkas:
- Total Produk & Kategori.
- **Low Stock Alert**: Peringatan otomatis jika stok barang < 10.

### 2. Manajemen Produk & Kategori
- Tabel data yang rapi dengan badge warna-warni untuk status stok.
- Form input yang modern dan *user-friendly*.

### 3. Keamanan (Security)
- **Authentication**: Sistem Login yang aman.
- **Role-Based Access Control (RBAC)**: Pemisahan hak akses Admin vs Staff.

---

## 🛠️ Instalasi & Setup

Clone repository ini, lalu jalankan perintah berikut di terminal:

```bash
# 1. Install Dependencies
composer install

# 2. Setup Environment
cp .env.example .env
php artisan key:generate

# 3. Setup Database & Seeding (PENTING: Untuk bikin User Default)
php artisan migrate:fresh --seed
```

> **Note**: Project ini menggunakan **Tailwind CSS via CDN**, jadi tidak perlu menjalankan `npm install` atau `npm run dev`. Praktis kan? 😉

### Akun Demo (Default)
Gunakan akun ini untuk pengujian:

| Role | Email | Password | Akses Fitur |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@gudangku.com` | `password` | Full Access (Create, Edit, Delete) |
| **Staff** | `staff@gudangku.com` | `password` | Read Only (View Data) |

---

## 📷 Screenshots
*Disini bisa nilampirkan screenshot Dashboard, Login Page, dan Form Input.*

---
*Untuk tugas akhir pemrograman web lanjut.*
