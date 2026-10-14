project mvc data film aditya atha maulana - 109062500057

# MVC PHP Native - Data Film

Aplikasi CRUD sederhana untuk mengelola katalog data film yang dibangun menggunakan PHP Native dengan menerapkan pola arsitektur Model-View-Controller (MVC) serta pencatatan histori pengembangan bertahap menggunakan Git[cite: 2, 3, 19].

---

## 🎯 1. Tujuan Aplikasi
Aplikasi ini dikembangkan untuk mempelajari dan menerapkan arsitektur web MVC pada PHP Native[cite: 2, 3]:
* **Pemisahan Tanggung Jawab (Separation of Concerns):** Memisahkan akses data (Model), alur/logika bisnis (Controller), dan tampilan antarmuka (View) agar kode lebih rapi dan mudah dirawat[cite: 3, 5].
* **Fitur Utama CRUD:** Memfasilitasi pengelolaan data katalog film, mencakup penambahan, pembaruan, penghapusan, dan pencarian/penampilan data[cite: 3, 16].
* **Keamanan Dasar:** Menggunakan *Prepared Statement* (PDO) untuk mencegah serangan *SQL Injection* serta `htmlspecialchars()` untuk mencegah *Cross-Site Scripting* (XSS)[cite: 3, 9, 13, 16].
* **Pelacakan Versi (Version Control):** Merekam setiap tahapan pengembangan aplikasi secara bertahap menggunakan Git[cite: 3, 6, 17, 19].

---

## 💻 2. Kebutuhan Sistem
Untuk menjalankan aplikasi ini dengan baik, pastikan lingkungan pengembangan kamu memiliki[cite: 15]:
* **PHP:** versi 8.0 atau yang lebih baru (dengan ekstensi `pdo_mysql` aktif)[cite: 8, 15].
* **Database Server:** MySQL / MariaDB[cite: 7, 15].
* **Web Server Lokal:** Laragon atau XAMPP[cite: 15].
* **Version Control:** Git[cite: 6, 15].

---

## 🛠️ 3. Cara Instalasi
1. **Clone / Salin Proyek:**
   Salin atau clone folder proyek ini ke dalam direktori web server lokal kamu[cite: 15]:
   * **Laragon:** `C:\laragon\www\mvc-film-php-atha`[cite: 1, 15, 19]
   * **XAMPP:** `C:\xampp\htdocs\mvc-film-php-atha`[cite: 15]

2. **Impor Database:**
   * Buka **phpMyAdmin** atau terminal MySQL[cite: 7, 14].
   * Buat database baru atau langsung impor skema database dari file `database/film.sql`[cite: 7, 15].

3. **Konfigurasi Database:**
   * Buka file `config/database.php`[cite: 8, 15].
   * Sesuaikan kredensial host, nama database (`db_film` / `film`), username, dan password sesuai pengaturan server lokal kamu[cite: 8, 15]:
     ```php
     private string $host = 'localhost';
     private string $db   = 'db_film';
     private string $user = 'root';
     private string $pass = '';
     ```[cite: 8]

---

## 📁 4. Struktur Folder
Struktur direktori proyek dirancang mengikuti arsitektur MVC berikut[cite: 5, 6]:

```text
mvc-film-php-atha/
├── app/
│   ├── controllers/
│   │   └── FilmController.php
│   ├── models/
│   │   └── Film.php
│   └── views/
│       └── film/
│           ├── index.php
│           ├── create.php
│           └── edit.php
├── config/
│   └── database.php
├── database/
│   └── film.sql
├── public/
│   └── index.php
├── .gitignore
└── README.md
```[cite: 5, 6]

### Penjelasan Komponen:
* **`app/controllers/FilmController.php`:** Menerima request dari router, memvalidasi input, memanggil model `Film`, dan menentukan view yang dimuat[cite: 5, 10].
* **`app/models/Film.php`:** Mengelola logika query ke database (CRUD) menggunakan PDO[cite: 5, 8, 9].
* **`app/views/film/`:** Berisi antarmuka HTML untuk halaman daftar film (`index.php`), form tambah (`create.php`), dan form edit (`edit.php`)[cite: 5, 11, 12].
* **`config/database.php`:** Menyediakan koneksi database berbasis PDO[cite: 5, 8].
* **`database/film.sql`:** Menyimpan skema tabel film dan data awal untuk pengujian[cite: 6, 7].
* **`public/index.php`:** Berperan sebagai *front controller* dan *router* utama aplikasi[cite: 5, 13, 14].

---

## 🚀 5. Cara Menjalankan Aplikasi
1. Pastikan Web Server (Apache/Nginx) dan MySQL di Laragon/XAMPP sudah aktif[cite: 14].
2. Buka browser dan akses URL berikut[cite: 1, 15]:
   ```text
   http://localhost/mvc-film-php-atha/public/index.php
   ```[cite: 1, 15]
3. **Pengujian Fitur CRUD:**
   * **Read:** Menampilkan daftar seluruh film pada halaman utama (`index.php`)[cite: 11, 15].
   * **Create:** Klik tombol **Tambah Data**, isi formulir (Judul, Sutradara, Genre, Tahun Rilis, Rating), lalu klik **Simpan**[cite: 11, 12, 15].
   * **Update:** Klik tombol **Edit** pada salah satu film, ubah informasi, lalu klik **Update**[cite: 11, 12, 15].
   * **Delete:** Klik tombol **Hapus** pada baris data film dan konfirmasi dialog untuk menghapus data[cite: 11, 15].

---

## 📜 6. Ringkasan Histori Pengembangan Git
Pengembangan dilakukan secara bertahap dengan pencatatan commit terstruktur[cite: 3, 17, 19]. Berikut adalah histori commit nyata dari proyek `mvc-film-php-atha`[cite: 19]:

```bash
git log --oneline --graph --decorate --all
```[cite: 15, 17, 19]

```text
* 2308361 (HEAD -> main) feat: add complete CRUD routing
* 14efd8f feat: add complete film CRUD views
* e1df202 feat: add film controller
* 9389763 feat: add complete film CRUD model
* 999e592 feat: add PDO database connection
* 9eaf027 feat: add film database schema
* e7fc3c8 chore: initialize mvc php native project
* cdac726 chore: initialize mve php native project
```[cite: 19]