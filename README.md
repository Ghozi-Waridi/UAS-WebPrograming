# Website Portal Berita

Portal Berita ABC adalah sebuah situs web yang menyediakan informasi terkini mengenai berbagai topik. Website ini dibuat sebagai bagian dari Ujian Akhir Semester pada mata kuliah Pemrograman Web, dengan tujuan untuk memahami dan mengimplementasikan konsep-konsep dasar dalam pengembangan web dinamis.

Website ini memiliki berbagai fitur untuk memudahkan pengguna mengakses berita dengan cepat dan mudah, serta memberikan pengalaman membaca yang nyaman melalui antarmuka yang sederhana dan responsif.

## Fitur Utama

- **Berita Terbaru**: Menampilkan daftar berita terbaru dari berbagai kategori.
- **Kategori Berita**: Pengguna dapat memilih kategori berita yang ingin dibaca, seperti politik, teknologi, hiburan, olahraga, dan lainnya.
- **Detail Berita**: Pengguna bisa mengklik setiap berita untuk membaca artikel secara lengkap.
- **Desain Responsif**: Website ini dirancang agar dapat diakses dengan baik di berbagai perangkat, baik di desktop, tablet, maupun ponsel.
- **Halaman Admin**: Fitur untuk mengelola berita, kategori, dan komentar (opsional, jika diterapkan).

## Prasyarat

Pastikan kamu memiliki hal-hal berikut sebelum memulai:

- [PHP](https://www.php.net/downloads) >= 7.4 (untuk proyek berbasis PHP)
- [Composer](https://getcomposer.org/) - untuk mengelola dependensi

## Instalasi

Ikuti langkah-langkah ini untuk mengatur proyek secara lokal.

1. **Clone repositori ini:**

   ```bash
   git clone https://github.com/username/proyek-anda.git
2. **Masuk ke direktori proyek:**
   
      ```bash
   cd proyek-anda

4. **Install dependensi dengan Composer:**

   ```bash
   composer install

6. **Konfigurasi Database:**

   ```bash
   <?php
   $dbHost = 'localhost';
   $dbName = 'portal_berita';
   $dbUser = 'root';
   $dbPass = '';

8. **Jalankan Aplikasi di Server Lokal:**
   
   ```bash
   composer start
   
10. **Akses Website:**

    ```bash
    http://localhost:8000

    
## Struktur Proyek

Berikut adalah struktur folder proyek ini:

```
.
├── .git/               # Folder Git yang menyimpan informasi versi kontrol
├── .idea/              # Folder konfigurasi IDE (misalnya IntelliJ, PhpStorm) - tidak perlu di-*track* oleh Git
├── assets/             # Folder untuk file statis seperti gambar, CSS, dan JavaScript
│   ├── css/            # Berisi file CSS untuk desain tampilan website
│   ├── js/             # Berisi file JavaScript untuk interaktivitas
│   └── images/         # Berisi gambar-gambar yang digunakan di halaman web
├── config/             # Folder untuk file konfigurasi seperti koneksi database dan pengaturan aplikasi
│   └── database.php    # Konfigurasi untuk menghubungkan ke database MySQL
├── public/             # Folder untuk file yang dapat diakses oleh pengguna, seperti file HTML dan index.php
│   └── index.php       # Halaman utama website yang menampilkan daftar berita
├── src/                # Folder untuk kode sumber utama (logika aplikasi)
│   ├── controllers/    # Mengelola logika aplikasi (misalnya, pengambilan berita dari database)
│   ├── models/         # Berisi file PHP untuk mendefinisikan struktur data dan berinteraksi dengan database
│   └── views/          # Berisi template untuk menampilkan data, seperti halaman berita, kategori, dll.
├── test/               # Folder untuk file pengujian atau unit test aplikasi
├── vendor/             # Folder yang berisi dependensi (diinstal melalui Composer) - tidak perlu di-*track* oleh Git
├── .gitignore          # File untuk menentukan file/folder yang tidak perlu dimasukkan ke dalam kontrol versi Git
├── composer.json       # File konfigurasi Composer untuk mengelola dependensi PHP
└── composer.lock       # File yang mengunci versi dependensi agar konsisten di berbagai lingkungan
```

### **Penjelasan Setiap Folder:**

1. **`.git/`**  
   Merupakan folder yang dibuat oleh Git untuk menyimpan informasi tentang kontrol versi.

2. **`.idea/`**  
   Folder konfigurasi IDE (misalnya PhpStorm atau IntelliJ) yang berisi pengaturan proyek yang bersifat lokal.

3. **`assets/`**  
   Folder ini menyimpan file-file statis seperti gambar, file CSS, dan JavaScript yang digunakan di halaman web.

4. **`config/`**  
   Menyimpan file konfigurasi aplikasi, seperti pengaturan koneksi ke database.

5. **`public/`**  
   Merupakan folder yang dapat diakses oleh pengguna, tempat di mana file HTML utama dan entry point aplikasi berada.

6. **`src/`**  
   Tempat untuk kode sumber aplikasi yang berisi kontroler, model, dan tampilan.

7. **`test/`**  
   Berisi unit test untuk menguji setiap bagian dari aplikasi.

8. **`vendor/`**  
   Folder ini berisi dependensi aplikasi yang diinstal menggunakan Composer.

9. **`.gitignore`**  
   File yang berfungsi untuk mengabaikan file atau folder yang tidak perlu dimasukkan ke dalam Git (seperti `vendor/`).

10. **`composer.json` dan `composer.lock`**  
    Digunakan untuk mengelola dependensi PHP dengan Composer.

---

### **Kontribusi**

Jika kamu ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

1. Fork repositori ini.
2. Buat branch baru untuk fitur atau perbaikan yang ingin kamu buat.
3. Commit perubahan yang kamu buat.
4. Kirim pull request dengan deskripsi perubahan yang jelas.

