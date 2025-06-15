# Nama : Ahmad Ghozi Waridi <br> NIM : 230605110083 <br> Kelas : Pemograman Web B
---

# Website Portal Berita

Portal Berita NusantaraIN adalah sebuah situs web yang menyediakan informasi terkini mengenai berbagai topik. Website ini dibuat sebagai bagian dari Ujian Akhir Semester pada mata kuliah Pemrograman Web, dengan tujuan untuk memahami dan mengimplementasikan konsep-konsep dasar dalam pengembangan web dinamis.

Website ini memiliki berbagai fitur untuk memudahkan pengguna mengakses berita dengan cepat dan mudah, serta memberikan pengalaman membaca yang nyaman melalui antarmuka yang sederhana dan responsif.

## Fitur Utama

- **Berita Terbaru**: Menampilkan daftar berita terbaru dari berbagai kategori.
- **Kategori Berita**: Pengguna dapat memilih kategori berita yang ingin dibaca, seperti politik, teknologi, hiburan, olahraga, dan lainnya.
- **Detail Berita**: Pengguna bisa mengklik setiap berita untuk membaca artikel secara lengkap.
- **Desain Responsif**: Website ini dirancang agar dapat diakses dengan baik di berbagai perangkat, baik di desktop, tablet, maupun ponsel.
- **Halaman Admin**: Fitur untuk mengelola berita, kategori, dan komentar (opsional, jika diterapkan).

## Prasyarat

Pastikan kamu memiliki hal-hal berikut sebelum memulai:

- [PHP](https://www.php.net/downloads) >= 8.4.5 (untuk proyek berbasis PHP)
- [Composer](https://getcomposer.org/) - untuk mengelola dependensi

## Instalasi

Ikuti langkah-langkah ini untuk mengatur proyek secara lokal.

1. **Clone repositori ini:**

   ```bash
   git clone https://github.com/Ghozi-Waridi/UAS-WebPrograming.git
2. **Masuk ke direktori proyek:**
   
      ```bash
   cd UAS-WebPrograming

4. **Install dependensi dengan Composer:**

   ```bash
   composer install

6. **Konfigurasi Database:**

   ```bash
   <?php
   $dbHost = 'localhost';
   $dbName = 'db_name_anda';
   $dbUser = 'user_db_anda';
   $dbPass = 'pass_db_anda';

8. **Jalankan Aplikasi di Server Lokal:**
   
   ```bash
   composer start
   
10. **Akses Website:**
    ```bash
    http://localhost:8000
12. **Generate Feature:**
    ```bash
    python3 generate.py



### **Struktur Folder dan Penjelasan:**
## Struktur Folder

Berikut adalah struktur folder proyek ini:

```
.
├── config/             # Folder untuk file konfigurasi seperti koneksi database dan pengaturan aplikasi
│   └── database.php    # Konfigurasi untuk menghubungkan ke database MySQL
├── public/             # Folder untuk file yang dapat diakses oleh pengguna, seperti file HTML dan index.php
|   ├── assets/             # Folder untuk file statis seperti gambar\
│   ├── css/            # Berisi file CSS untuk desain tampilan website
│   ├── js/             # Berisi file JavaScript untuk interaktivitas
│   └── index.php       # Halaman utama website yang menampilkan daftar berita
├── src/                # Folder untuk kode sumber utama (logika aplikasi)
│   ├── constants/      # Folder string static sebagai path icons
|   │    ├── icons/     # Berisi string statis path icons
│   |    ├── image/     # Berisi string static image  
│   |    └── Router/    # Folder untuk 
|   │    |    ├── router.php/   # Mengelola rute aplikasi, mengarahkan permintaan ke controller yang sesuai.
│   |    |    └── web.php/      # Berisi konfigurasi untuk routing atau pengaturan URL.
│   ├── features/               # Folder ini berisi bagian aplikasi yang mengelola fitur utama seperti pengelolaan berita, kategori, dll.
│   │    ├── controllers/       # Mengelola logika aplikasi (seperti pengambilan data)
│   │    ├── models/            # Berisi file untuk mendefinisikan struktur data dan berinteraksi dengan database
│   │    └── views/             # Template tampilan untuk menampilkan data
│   └── main.php/       # File utama yang menjalankan aplikasi atau aplikasi entry point
├── test/               # Folder untuk file pengujian atau unit test aplikasi
├── vendor/             # Folder yang berisi dependensi (diinstal melalui Composer) - tidak perlu di-*track* oleh Git
├── .gitignore          # File untuk menentukan file/folder yang tidak perlu dimasukkan ke dalam kontrol versi Git
├── composer.json       # File konfigurasi Composer untuk mengelola dependensi PHP
├── generate.py         # File Mmebuat Featuer MVC
└── composer.lock       # File yang mengunci versi dependensi agar konsisten di berbagai lingkungan

```
### **Penjelasan:**



```
.
├── config/             # Folder untuk file konfigurasi seperti koneksi database dan pengaturan aplikasi
│   └── database.php    # Konfigurasi untuk menghubungkan ke database MySQL
```
- **`config/`**: Folder ini berisi file-file konfigurasi untuk aplikasi.
- **`database.php`**: File konfigurasi untuk mengatur penghubungan aplikasi dengan database MySQL (misalnya, mengatur username, password, dan nama database).

---

```
├── public/             # Folder untuk file yang dapat diakses oleh pengguna, seperti file HTML dan index.php
|   ├── assets/             # Folder untuk file statis seperti gambar\
│   ├── css/            # Berisi file CSS untuk desain tampilan website
│   ├── js/             # Berisi file JavaScript untuk interaktivitas
│   └── index.php       # Halaman utama website yang menampilkan daftar berita
```
- **`public/`**: Ini adalah folder yang diakses langsung oleh pengguna melalui browser. Semua file yang bisa diakses oleh pengguna (seperti halaman HTML atau PHP) harus ada di sini.
- **`assets/`**: Folder ini menyimpan semua file statis yang digunakan oleh aplikasi, seperti gambar.
- **`css/`**: Folder ini berisi file CSS yang digunakan untuk mendesain dan mengatur tampilan website.
- **`js/`**: Folder ini berisi file JavaScript yang memberikan interaktivitas pada website (misalnya, fungsi untuk mengubah konten dinamis, mengatur tampilan halaman, dll.).
- **`index.php`**: Halaman utama dari website yang menampilkan daftar berita atau konten lainnya.

---

```
├── src/                # Folder untuk kode sumber utama (logika aplikasi)
│   ├── constants/      # Folder string static sebagai path icons
|   │    ├── icons/     # Berisi string statis path icons
│   |    ├── image/     # Berisi string static image  
│   |    └── Router/    # Folder untuk 
|   │    |    ├── router.php/   # Mengelola rute aplikasi, mengarahkan permintaan ke controller yang sesuai.
│   |    |    └── web.php/      # Berisi konfigurasi untuk routing atau pengaturan URL.
│   ├── features/               # Folder ini berisi bagian aplikasi yang mengelola fitur utama seperti pengelolaan berita, kategori, dll.
│   │    ├── controllers/       # Mengelola logika aplikasi (seperti pengambilan data)
│   │    ├── models/            # Berisi file untuk mendefinisikan struktur data dan berinteraksi dengan database
│   │    └── views/             # Template tampilan untuk menampilkan data
│   └── main.php/       # File utama yang menjalankan aplikasi atau aplikasi entry point
```


---

```
├── test/               # Folder untuk file pengujian atau unit test aplikasi               
```
- **`test/`**: Folder ini berisi file pengujian atau unit tests untuk memastikan setiap bagian aplikasi berjalan dengan benar. Misalnya, untuk menguji controller atau model agar data yang diambil atau diproses sesuai dengan yang diharapkan.

---

```
├── vendor/             # Folder yang berisi dependensi (diinstal melalui Composer) - tidak perlu di-*track* oleh Git
```
- **`vendor/`**: Folder ini berisi dependensi eksternal yang diinstal menggunakan Composer (misalnya library PHP atau package pihak ketiga). Folder ini tidak perlu dimasukkan ke dalam repositori Git, karena dapat diinstal kembali oleh setiap pengembang yang menggunakan perintah `composer install`.

---

```
├── .gitignore          # File untuk menentukan file/folder yang tidak perlu dimasukkan ke dalam kontrol versi Git
```
- **`.gitignore`**: File ini digunakan untuk mengabaikan file atau folder tertentu agar tidak dimasukkan ke dalam repositori Git, seperti `vendor/`, file log, atau file konfigurasi lokal.

---

```
├── composer.json       # File konfigurasi Composer untuk mengelola dependensi PHP
├── generate.py         # File Mmebuat Featuer MVC
└── composer.lock       # File yang mengunci versi dependensi agar konsisten di berbagai lingkungan       
```
- **`composer.json`**: File konfigurasi untuk Composer, yang mendefinisikan dependensi PHP yang dibutuhkan aplikasi.
- **`generate.py`**: File Generate feature MVC dengan memasukan nama featurenya 
- **`composer.lock`**: File ini mengunci versi dari dependensi yang digunakan dalam proyek, untuk memastikan bahwa setiap pengembang menggunakan versi dependensi yang sama.

---

### *Struktur Tabel Mysql: *
1. **Tabel `article`**
   Tabel ini menyimpan data article
   
   | **Kolom** | **Tipe Data**        | **Deskripsi**                      |
   |-----------|----------------------|------------------------------------|
   | `id`      | `int(11)`            | ID unik artikel (Primary Key)     |
   | `date`    | `varchar(20)`        | Tanggal artikel                   |
   | `title`   | `varchar(255)`       | Judul artikel                     |
   | `content` | `text NOT NULL`      | Isi artikel                       |
   | `picture` | `varchar(255)`       | Nama file gambar (opsional)       |

   ---

3. **Tabel `author`**
   Tabel ini menyimpan data penulis article
   
   | **Kolom**   | **Tipe Data**     | **Deskripsi**                              |
   |-------------|-------------------|--------------------------------------------|
   | `id`        | `int(11)`         | ID unik penulis (Primary Key)             |
   | `nickname`  | `varchar(100)`    | Nama panggilan penulis                    |
   | `email`     | `varchar(150)`    | Email penulis                             |
   | `password`  | `varchar(255)`    | Kata sandi penulis                        |

   ---
   
5. **Tabel `Category`**
   Tabel ini menyimpan kategori article
   
   | **Kolom**   | **Tipe Data**     | **Deskripsi**                              |
   |-------------|-------------------|--------------------------------------------|
   | `id`        | `int(11)`         | ID unik kategori (Primary Key)            |
   | `name`      | `varchar(100)`    | Nama kategori                             |
   | `description`      | `text NULL`    | Deskripsi kategori                             |

   ---
6. **Tabel `aritcle_author`**
   Tabel ini menghubungkan tabel article dan author
   
   | **Kolom**    | **Tipe Data**   | **Deskripsi**                              |
   |--------------|-----------------|--------------------------------------------|
   | `article_id` | `int(11)`       | ID artikel (Foreign Key ke `article`)      |
   | `author_id`  | `int(11)`       | ID penulis (Foreign Key ke `author`)       |
   
   ---
8. **Tabel `article_category`**
   Tabel ini menghubungkan tabel article dan category
   
   | **Kolom**      | **Tipe Data**   | **Deskripsi**                              |
   |----------------|-----------------|--------------------------------------------|
   | `article_id`   | `int(11)`       | ID artikel (Foreign Key ke `article`)      |
   | `category_id`  | `int(11)`       | ID kategori (Foreign Key ke `category`)    |



   ---

### *Relasi Antar Tabel*
1.⁠ ⁠*⁠ article ⁠ dan ⁠ article_author ⁠*
   - Relasi many-to-many antara artikel dan penulis. Tabel ⁠ article_author ⁠ menghubungkan artikel dengan penulisnya.
   - Relasi ini ditentukan oleh kolom ⁠ article_id ⁠ di ⁠ article_author ⁠ yang merujuk ke ⁠ article.id ⁠ dan ⁠ author_id ⁠ yang merujuk ke ⁠ author.id ⁠.

2.⁠ ⁠*⁠ article ⁠ dan ⁠ article_category ⁠*
   - Relasi many-to-many antara artikel dan kategori. Tabel ⁠ article_category ⁠ menghubungkan artikel dengan kategori yang relevan.
   - Relasi ini ditentukan oleh kolom ⁠ article_id ⁠ di ⁠ article_category ⁠ yang merujuk ke ⁠ article.id ⁠ dan ⁠ category_id ⁠ yang merujuk ke ⁠ category.id ⁠.

3.⁠ ⁠*⁠ article ⁠ dan ⁠ author ⁠*
   - Artikel dapat ditulis oleh banyak penulis, dan seorang penulis bisa menulis banyak artikel, yang dibantu oleh tabel ⁠ article_author ⁠.

4.⁠ ⁠*⁠ article ⁠ dan ⁠ category ⁠*
   - Setiap artikel dapat memiliki banyak kategori, dan setiap kategori bisa memiliki banyak artikel, yang dibantu oleh tabel ⁠ article_category ⁠.

---


# 📰 Artikelku - Platform Berbagi Artikel Modern

![GitHub repo size](https://img.shields.io/github/repo-size/username/repo-name?style=for-the-badge)
![GitHub stars](https://img.shields.io/github/stars/username/repo-name?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/username/repo-name?style=for-the-badge)
![GitHub issues](https://img.shields.io/github/issues/username/repo-name?style=for-the-badge)

**Artikelku** adalah platform berbagi artikel modern yang dirancang untuk memberikan pengalaman menulis, membaca, dan mengelola artikel yang nyaman, baik bagi pengguna umum maupun admin.

---

## ✨ Fitur Utama

### 🔝 Halaman Utama
<img src="https://github.com/user-attachments/assets/ab9f2064-1e53-419a-bdcf-06362c8d3b71" width="100%" />

- Navigasi sederhana dengan menu **Beranda** dan **Kategori**.
- Carousel 3 artikel terbaru yang sedang booming.
- Akses login ke profil pengguna di pojok kanan atas.

---

### 🔥 Artikel Populer Hari Ini
<img src="https://github.com/user-attachments/assets/84d2a813-41f2-42db-88fa-aa6550ef83bd" width="80%" />

- Menampilkan artikel yang sedang trending setelah carousel.

---

### 📖 Halaman Detail Artikel
<img src="https://github.com/user-attachments/assets/1e85aa29-ba8b-4c19-84e8-e584f2334652" width="100%" />

- Membaca artikel secara penuh.
- Menampilkan artikel terkait berdasarkan kategori.
- *Catatan:* Fitur pencarian masih dalam pengembangan — saran dan kontribusi sangat diharapkan!

---

### 🗂️ Filter Berdasarkan Kategori
<img src="https://github.com/user-attachments/assets/c758e2f8-ea1c-4981-a118-09b7e6d5017d" width="100%" />

- Tombol kategori akan memfilter dan menampilkan semua artikel dalam kategori tersebut.
- Fitur pencarian juga tersedia (dalam pengembangan).

---

### 🔐 Autentikasi Pengguna

<img width="1440" alt="Jepretan Layar 2025-06-15 pukul 10 01 45" src="https://github.com/user-attachments/assets/fa6e17ff-45d0-40f5-9885-1ffaf41a87c7" />
<img width="1391" alt="Jepretan Layar 2025-06-15 pukul 10 02 06" src="https://github.com/user-attachments/assets/8c9d789d-fd4c-4e15-8ea5-e4d455a4f108" />

- Validasi login dan registrasi pengguna.
- Feedback kesalahan dan keberhasilan ditampilkan dengan jelas.

---

### 👤 Halaman Profil Pengguna
<img src="https://github.com/user-attachments/assets/59a57f96-f3c1-4944-badb-a8acb468ab4f" width="100%" />


- Tampilkan data pribadi.
- Edit profil dan ubah password.

---

### ✍️ Kelola Artikel Pengguna
<img src="https://github.com/user-attachments/assets/3d9828d0-052d-4de5-9b28-33e4fcd1c5b1" width="100%" />
<img width="100%" alt="Jepretan Layar 2025-06-15 pukul 10 03 09" src="https://github.com/user-attachments/assets/6e04d982-94f5-4224-84e5-9b4b4bfa81f6" />
<img src="https://github.com/user-attachments/assets/638059bf-cd11-4d8c-9f13-1b7ff75e9ed8" width="45%" />  
<img src="https://github.com/user-attachments/assets/10b1ca01-f039-4fc6-a88c-4334cae810c6" width="45%" />

- Lihat semua artikel yang telah dibuat.
- Tambah artikel baru melalui pop-up editor.
- Status artikel:
  - ✅ **Approved** (Hijau): Artikel diterima admin.
  - ⏳ **Pending** (Kuning): Artikel menunggu persetujuan.

---

### 🧑‍💼 Dashboard Admin
<img src="https://github.com/user-attachments/assets/1020bb1b-43e6-47dd-ac7c-5dd43674de6a" width="100%" />

- Admin dapat mengelola:
  - Data pengguna.
  - Persetujuan artikel.
  - Penghapusan artikel.

<img src="https://github.com/user-attachments/assets/1b455666-e4ac-40a2-9bdb-7c71ab4905ab" width="100%" />

- Statistik jumlah artikel per pengguna.

<img src="https://github.com/user-attachments/assets/9e67728b-b8e2-4cb5-b0f9-2fe4a7260c10" width="100%" />

- Lihat dan kelola daftar artikel yang menunggu persetujuan.

---

## 🚧 Fitur yang Akan Datang

- 🔎 Sistem pencarian artikel yang lebih canggih.

---

## 🛠️ Teknologi yang Digunakan

- Frontend: HTML, CSS, JavaScrip.
- Backend: PHP Native
- Database: MySQL

---

## 🧑‍💻 Kontribusi

Kontribusi sangat terbuka! Jika kamu memiliki ide untuk fitur baru atau ingin memperbaiki bug, silakan buat pull request atau buka issue terlebih dahulu.

---

## 📫 Kontak

Jika kamu memiliki saran, masukan, atau ide untuk fitur pencarian, silakan hubungi saya melalui:

- 📧 Email: [ghoziwaridi@gmail.com]
- 📱 Instagram: [https://www.instagram.com/ahmad.ghozi.waridi/]


---

> Dibuat dengan ❤️ oleh [AHMAD GHOZI WARIDI]




