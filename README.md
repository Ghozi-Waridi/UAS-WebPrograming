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
   $dbName = 'db_name_anda';
   $dbUser = 'user_db_anda';
   $dbPass = 'pass_db_anda';

8. **Jalankan Aplikasi di Server Lokal:**
   
   ```bash
   composer start
   
10. **Akses Website:**

    ```bash
    http://localhost:8000

### **Struktur Folder dan Penjelasan:**
## Struktur Folder

Berikut adalah struktur folder proyek ini:

```
.
├── assets/             # Folder untuk file statis seperti gambar\
│   └── images/         # Berisi gambar-gambar yang digunakan di halaman web
├── config/             # Folder untuk file konfigurasi seperti koneksi database dan pengaturan aplikasi
│   └── database.php    # Konfigurasi untuk menghubungkan ke database MySQL
├── public/             # Folder untuk file yang dapat diakses oleh pengguna, seperti file HTML dan index.php
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
│   ├── service/        # Berisi layanan atau fungsionalitas tambahan yang mendukung aplikasi.
│   ├── shared/         # Folder untuk kode yang digunakan secara bersama (misalnya fungsi umum)
│   └── main.php/       # File utama yang menjalankan aplikasi atau aplikasi entry point
├── test/               # Folder untuk file pengujian atau unit test aplikasi
├── vendor/             # Folder yang berisi dependensi (diinstal melalui Composer) - tidak perlu di-*track* oleh Git
├── .gitignore          # File untuk menentukan file/folder yang tidak perlu dimasukkan ke dalam kontrol versi Git
├── composer.json       # File konfigurasi Composer untuk mengelola dependensi PHP
└── composer.lock       # File yang mengunci versi dependensi agar konsisten di berbagai lingkungan
```
### **Penjelasan:**

```
.
├── assets/             # Folder untuk file statis seperti gambar\
│   └── images/         # Berisi gambar-gambar yang digunakan di halaman web
```
- **`assets/`**: Folder ini menyimpan semua file statis yang digunakan oleh aplikasi, seperti gambar, CSS, dan JavaScript.
- **`images/`**: Berisi gambar-gambar yang digunakan untuk konten di halaman web (misalnya, logo, gambar artikel, dll.).

---

```
├── config/             # Folder untuk file konfigurasi seperti koneksi database dan pengaturan aplikasi
│   └── database.php    # Konfigurasi untuk menghubungkan ke database MySQL
```
- **`config/`**: Folder ini berisi file-file konfigurasi untuk aplikasi.
- **`database.php`**: File konfigurasi untuk mengatur penghubungan aplikasi dengan database MySQL (misalnya, mengatur username, password, dan nama database).

---

```
├── public/             # Folder untuk file yang dapat diakses oleh pengguna, seperti file HTML dan index.php
│   ├── css/            # Berisi file CSS untuk desain tampilan website
│   ├── js/             # Berisi file JavaScript untuk interaktivitas
│   └── index.php       # Halaman utama website yang menampilkan daftar berita
```
- **`public/`**: Ini adalah folder yang diakses langsung oleh pengguna melalui browser. Semua file yang bisa diakses oleh pengguna (seperti halaman HTML atau PHP) harus ada di sini.
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
│   ├── service/        # Berisi layanan atau fungsionalitas tambahan yang mendukung aplikasi.
│   ├── shared/         # Folder untuk kode yang digunakan secara bersama (misalnya fungsi umum)
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
└── composer.lock       # File yang mengunci versi dependensi agar konsisten di berbagai lingkungan       
```
- **`composer.json`**: File konfigurasi untuk Composer, yang mendefinisikan dependensi PHP yang dibutuhkan aplikasi. 
- **`composer.lock`**: File ini mengunci versi dari dependensi yang digunakan dalam proyek, untuk memastikan bahwa setiap pengembang menggunakan versi dependensi yang sama.

---

### **Struktur Tabel Mysql: **
1. **Tabel `article`**
   Tabel ini menyimpan data article
   
   | **Kolom** | **Tipe Data**        | **Deskripsi**                      |
   |-----------|----------------------|------------------------------------|
   | `id`      | `int(11)`            | ID unik artikel (Primary Key)     |
   | `date`    | `varchar(20)`        | Tanggal artikel                   |
   | `title`   | `varchar(255)`       | Judul artikel                     |
   | `content` | `text NOT NULL`      | Isi artikel                       |
   | `picture` | `varchar(255)`       | Nama file gambar (opsional)       |

3. **Tabel `author`**
   Tabel ini menyimpan data penulis article
   
   | **Kolom**   | **Tipe Data**     | **Deskripsi**                              |
   |-------------|-------------------|--------------------------------------------|
   | `id`        | `int(11)`         | ID unik penulis (Primary Key)             |
   | `nickname`  | `varchar(100)`    | Nama panggilan penulis                    |
   | `email`     | `varchar(150)`    | Email penulis                             |
   | `password`  | `varchar(255)`    | Kata sandi penulis                        |
   
4. **Tabel `Category`**
   Tabel ini menyimpan kategori article
   
   | **Kolom**   | **Tipe Data**     | **Deskripsi**                              |
   |-------------|-------------------|--------------------------------------------|
   | `id`        | `int(11)`         | ID unik kategori (Primary Key)            |
   | `name`      | `varchar(100)`    | Nama kategori                             |
   | `description`      | `text NULL`    | Deskripsi kategori                             |
   
6. **Tabel `aritcle_author`**
   Tabel ini menghubungkan tabel article dan author
   
   | **Kolom**    | **Tipe Data**   | **Deskripsi**                              |
   |--------------|-----------------|--------------------------------------------|
   | `article_id` | `int(11)`       | ID artikel (Foreign Key ke `article`)      |
   | `author_id`  | `int(11)`       | ID penulis (Foreign Key ke `author`)       |
   
7. **Tabel `article_category`**
   Tabel ini menghubungkan tabel article dan category
   
   | **Kolom**      | **Tipe Data**   | **Deskripsi**                              |
   |----------------|-----------------|--------------------------------------------|
   | `article_id`   | `int(11)`       | ID artikel (Foreign Key ke `article`)      |
   | `category_id`  | `int(11)`       | ID kategori (Foreign Key ke `category`)    |


