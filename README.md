# Instalasi

1. **Clone repositori:**

    ```sh
    git https://github.com/iska08/spk-skripsi.git
    cd spk-skripsi
    ```

2. **Instal dependensi PHP:**

    Pastikan Anda telah menginstal [Composer](https://getcomposer.org/).

    ```sh
    composer install
    ```
4. **Siapkan file lingkungan:**

    Salin file `.env.example` ke `.env`:

    ```sh
    cp .env.example .env
    ```

    Buka file `.env` dan atur kredensial database Anda serta variabel lingkungan lainnya.

5. **Hasilkan kunci aplikasi:**

    ```sh
    php artisan key:generate
    ```

6. **Jalankan migrasi database:**

    Pastikan database Anda sudah dikonfigurasi di file `.env`.

    ```sh
    php artisan migrate
    ```

7. **(Opsional) Isi database dengan data awal:**

    Jika proyek Anda termasuk data seed, Anda dapat mengisi database.

    ```sh
    php artisan db:seed
    ```

8. **Jalankan server pengembangan:**

    ```sh
    php artisan serve
    ```

    Aplikasi Anda akan dapat diakses di `http://localhost:8000`.

# Tampilan Aplikasi

## Portal

### Portal Sebelum Login

![Portal Sebelum Login](</screenshoot/Portal/Portal (Before Login).png>)

### Portal Sesudah Login

![Portal Sesudah Login](</screenshoot/Portal/Portal (After Login).png>)

## Login

![Login](</screenshoot/Auth/Login (All).png>)

## Register

![Register](</screenshoot/Auth/Register (User).png>)

## Admin

### Dashboard

![Dashboard](</screenshoot/Dashboard/Admin - Dashboard.png>)

### Data Kriteria

#### Tambah Data Kriteria

![Tambah Data Kriteria](</screenshoot/Kriteria/Admin - Tambah Data Kriteria.png>)

#### Edit Data Kriteria

![Edit Data Kriteria](</screenshoot/Kriteria/Admin - Edit Data Kriteria.png>)

#### List Data Kriteria

![List Data Kriteria](</screenshoot/Kriteria/Admin - List Data Kriteria.png>)

### Data Destinasi Wisata

#### Tambah Data Destinasi Wisata

![Tambah Data Destinasi Wisata](</screenshoot/Wisata/Admin - Tambah Data Destinasi Wisata.png>)

#### Edit Data Destinasi Wisata

![Edit Data Destinasi Wisata](</screenshoot/Wisata/Admin - Edit Data Destinasi Wisata.png>)

#### List Data Destinasi Wisata

![List Data Destinasi Wisata](</screenshoot/Wisata/Admin - List Data Destinasi Wisata.png>)

### Data Jenis Wisata

#### Tambah Data Jenis Wisata

![Tambah Data Jenis Wisata](</screenshoot/Jenis/Admin - Tambah Data Jenis Wisata.png>)

#### Edit Data Jenis Wisata

![Edit Data Jenis Wisata](</screenshoot/Jenis/Admin - Edit Data Jenis Wisata.png>)

#### List Data Jenis Wisata

![List Data Jenis Wisata](</screenshoot/Jenis/Admin - List Data Jenis Wisata.png>)

#### List Detail Data Jenis Wisata

![List Detail Data Jenis Wisata](</screenshoot/Jenis/Admin - List Detail Data Jenis Wisata.png>)

### Data Alternatif

#### Tambah Data Alternatif

![Tambah Data Alternatif](</screenshoot/Alternatif/Admin - Tambah Data Alternatif.png>)

#### Edit Data Alternatif

![Edit Data Alternatif](</screenshoot/Alternatif/Admin - Edit Data Alternatif.png>)

#### List Data Alternatif

![List Data Alternatif](</screenshoot/Alternatif/Admin - List Data Alternatif.png>)

### Validasi Saran Destinasi Wisata

![Validasi Saran Destinasi Wisata](</screenshoot/Saran/Admin - Validasi Saran Destinasi Wisata.png>)

### Data Perhitungan

#### Tambah Data Perhitungan

![Tambah Data Perhitungan](</screenshoot/Perhitungan/Admin - Tambah Data Perhitungan.png>)

#### Edit Perbandingan Kriteria Data Perhitungan

![Edit Perbandingan Kriteria Data Perhitungan](</screenshoot/Perhitungan/Admin - Edit Perbandingan Kriteria Data Perhitungan.png>)

#### Edit Bobot Data Perhitungan

![Edit Bobot Data Perhitungan](</screenshoot/Perhitungan/Admin - Edit Bobot Data Perhitungan.png>)

#### List Data Perhitungan

![List Data Perhitungan](</screenshoot/Perhitungan/Admin - List Data Perhitungan.png>)

### Data Pengguna

#### Tambah Data Pengguna

![Tambah Data Pengguna](</screenshoot/User/Admin - Tambah Data Pengguna.png>)

#### Edit Data Pengguna

![Edit Data Pengguna](</screenshoot/User/Admin - Edit Data Pengguna.png>)

#### List Data Pengguna

![List Data Pengguna](</screenshoot/User/Admin - List Data Pengguna.png>)

### Ubah Profil

![Ubah Profil](</screenshoot/Profile/Admin - Ubah Profil.png>)

## User

### Dashboard

![Dashboard](</screenshoot/Dashboard/User - Dashboard.png>)

### Saran Destinasi Wisata

#### Tambah Saran Destinasi Wisata

![Tambah Saran Destinasi Wisata](</screenshoot/Saran/User - Tambah Saran Destinasi Wisata.png>)

#### Edit Saran Destinasi Wisata

![Edit Saran Destinasi Wisata](</screenshoot/Saran/User - Edit Saran Destinasi Wisata.png>)

#### List Saran Destinasi Wisata

![List Saran Destinasi Wisata](</screenshoot/Saran/User - List Saran Destinasi Wisata.png>)

### Ubah Profil

![Ubah Profil](</screenshoot/Profile/User - Ubah Profil.png>)

## Non-Auth

### Dashboard

![Dashboard](</screenshoot/Dashboard/Non Auth - Dashboard.png>)

### Data Kriteria

![Data Kriteria](</screenshoot/Kriteria/User - List Data Kriteria.png>)

### Data Destinasi Wisata

![Data Destinasi Wisata](</screenshoot/Wisata/User - List Data Destinasi Wisata.png>)

### Data Jenis Wisata

![Data Jenis Wisata](</screenshoot/Jenis/User - List Data Jenis Wisata.png>)

### Detail Data Jenis Wisata

![Detail Data Jenis Wisata](</screenshoot/Jenis/User - List Detail Jenis Wisata.png>)

### Data Alternatif

![Data Alternatif](</screenshoot/Alternatif/User - List Data Alternatif.png>)

### Metode SPK

![Metode SPK](</screenshoot/Metode SPK/Metode SPK.png>)

#### Perhitungan Metode

##### Perhitungan Kombinasi

###### Matriks Perbandingan dan Penjumlahan Kolom Kriteria

![Matriks Perbandingan dan Penjumlahan Kolom Kriteria](</screenshoot/Kombinasi/1.1 Kombinasi - Matriks Perbandingan dan Penjumlahan Kolom Kriteria.png>)

###### Matriks Normalisasi Kriteria dan Eigen Vector (EV)

![Matriks Normalisasi Kriteria dan Eigen Vector (EV)](</screenshoot/Kombinasi/2.1 Kombinasi - Matriks Normalisasi Kriteria dan Eigen Vector (EV).png>)

###### Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV)

![Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV)](</screenshoot/Kombinasi/3.1 Kombinasi - Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV).png>)

###### Menentukan λmaks dan Rasio Konsistensi

![Menentukan λmaks dan Rasio Konsistensi](</screenshoot/Kombinasi/4.1 Kombinasi - Menentukan λmaks dan Rasio Konsistensi.png>)

###### Normalisasi Alternatif

![Normalisasi Alternatif](</screenshoot/Kombinasi/5.1 Kombinasi - Normalisasi Alternatif.png>)

###### Ranking

![Ranking](</screenshoot/Kombinasi/6.1 Kombinasi - Ranking.png>)

##### Perhitungan AHP

##### Matriks Perbandingan dan Penjumlahan Kolom Kriteria

![Matriks Perbandingan dan Penjumlahan Kolom Kriteria](</screenshoot/AHP/1.1 AHP - Matriks Perbandingan dan Penjumlahan Kolom Kriteria.png>)

##### Matriks Normalisasi Kriteria dan Eigen Vector (EV)

![Matriks Normalisasi Kriteria dan Eigen Vector (EV)](</screenshoot/AHP/2.1 AHP - Matriks Normalisasi Kriteria dan Eigen Vector (EV).png>)

##### Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV)

![Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV)](</screenshoot/AHP/3.1 AHP - Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV).png>)

##### Menentukan λmaks dan Rasio Konsistensi

![Menentukan λmaks dan Rasio Konsistensi](</screenshoot/AHP/4.1 AHP - Menentukan λmaks dan Rasio Konsistensi.png>)

##### Menentukan Eigen Vector Alternatif di Setiap Kriteria

![Menentukan Eigen Vector Alternatif di Setiap Kriteria](</screenshoot/AHP/5.1 AHP - Menentukan Eigen Vector Alternatif di Setiap Kriteria.png>)

##### Ranking

![Ranking](</screenshoot/AHP/6.1 AHP - Ranking.png>)

##### Perhitungan SAW

##### Normalisasi Alternatif

![Normalisasi Alternatif](</screenshoot/SAW/1.1 SAW - Normalisasi Alternatif.png>)

##### Ranking

![Ranking](</screenshoot/SAW/2.1 SAW - Ranking.png>)

#### Detail Perhitungan Metode

##### Perhitungan Kombinasi

###### Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail)

![Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail)](</screenshoot/Kombinasi/1.2 Kombinasi - Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail).png>)

###### Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail)

![Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail)](</screenshoot/Kombinasi/2.2 Kombinasi - Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail).png>)

###### Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail)

![Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail)](</screenshoot/Kombinasi/3.2 Kombinasi - Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail).png>)

###### Menentukan λmaks dan Rasio Konsistensi (Detail)

![Menentukan λmaks dan Rasio Konsistensi (Detail)](</screenshoot/Kombinasi/4.2 Kombinasi - Menentukan λmaks dan Rasio Konsistensi (Detail).png>)

###### Normalisasi Alternatif (Detail)

![Normalisasi Alternatif (Detail)](</screenshoot/Kombinasi/5.2 Kombinasi - Normalisasi Alternatif (Detail).png>)

###### Ranking (Detail)

![Ranking (Detail)](</screenshoot/Kombinasi/6.2 Kombinasi - Ranking (Detail).png>)

##### Perhitungan AHP

###### Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail)

![Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail)](</screenshoot/AHP/1.2 AHP - Matriks Perbandingan dan Penjumlahan Kolom Kriteria (Detail).png>)

###### Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail)

![Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail)](</screenshoot/AHP/2.2 AHP - Matriks Normalisasi Kriteria dan Eigen Vector (EV) (Detail).png>)

###### Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail)

![Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail)](</screenshoot/AHP/3.2 AHP - Matriks Perkalian Setiap Elemen dengan Eigen Vector (EV) (Detail).png>)

###### Menentukan λmaks dan Rasio Konsistensi (Detail)

![Menentukan λmaks dan Rasio Konsistensi (Detail)](</screenshoot/AHP/4.2 AHP - Menentukan λmaks dan Rasio Konsistensi (Detail).png>)

###### Menentukan Eigen Vector Alternatif di Setiap Kriteria (Detail)

![Menentukan Eigen Vector Alternatif di Setiap Kriteria (Detail)](</screenshoot/AHP/5.2 AHP - Menentukan Eigen Vector Alternatif di Setiap Kriteria (Detail).png>)

###### Ranking (Detail)

![Ranking (Detail)](</screenshoot/AHP/6.2 AHP - Ranking (Detail).png>)

##### Perhitungan SAW

###### Normalisasi Alternatif (Detail)

![Normalisasi Alternatif (Detail)](</screenshoot/SAW/1.2 SAW - Normalisasi Alternatif (Detail).png>)

###### Ranking (Detail)

![Ranking (Detail)](</screenshoot/SAW/2.2 SAW - Ranking (Detail).png>)