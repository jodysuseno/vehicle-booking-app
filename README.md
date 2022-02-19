
# Vehicle Booking App

### Login

Login admin:\
Username : jodysuseno\
Password : admin123

Login Approver:\
Username : jafardjawas\
Password : jafar123

### Instalasi

- Clone repository
- buat database vehicle pada database
- lakukan migrate dan seeding dengan masuk ke directory project dan mengetikan "php artisan migrate --seed"
- lalu jalankan laravel dengan mengetikan "php artisan serve"

### System Requirement

PHP v8.1.2\
MariaDB v10.4.22\
Framework Laravel 9

### Panduan

Login sebagain admin\
- Menu dashboard
    - terdapat grafik pemesanan kendaraan
- Menu Vehicle : 
    - untuk mengelola data kendaraan
- Menu Driver : 
    - untuk mengelola data sopir
- Menu setting->user : 
    - untuk mengelola data user admin dan Approver
- Vehicle Usage->booking : 
    - untuk melakukan pemesanan kendaraan dengan klik create booking lalu masukkan booking code(sementara belum otomatis), data pegawai dan pilih waktu, kendaraan, sopir, dan approfer setalaj itu klik save. setelah karena masih dipending tunggu hingga di approve oleh approver. jika di approve klik confrim untuk menyelesaikan pemesanan
- Report->Booking Periodic:
    - digunakan untuk melihat laporan tentang periodik pemesanan kendaraan

Loginn sebagai approval\
- Menu dashboard
    - terdapat grafik pemesanan kendaraan
- Vehicle Usage->booking :
    - digunakan untuk melakukan menyetujui pemesanan kendaraan dengan cara klik approve lalu status pemensanan menjadi approve jika reject maka tidak bisa dilanjutkan admin harus melakukan pemesanan ulang.
- Report->Booking Periodic:
    - digunakan untuk melihat laporan tentang periodik pemesanan kendaraan

** note : untuk featrue export excel masih belum bisa karena project ini masih terkendala tidak bisa terinstall dan error pada package library Excel laravel. untuk sementara dibuat menjadi download menjadi file .csv.\

Semoga saya bisa lolos untuk tes teknis ini. amin


