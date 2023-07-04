Selamat datang di repositori MVC PHP yang saya buat..
*credit WPU

Pertama, setelah membuat folder MVC, kita tambahkan folder public yang mana akan berisi data-data yang bisa diakses oleh user/guest. seperti ini petanya :
#public
    * css
    * img
    * js
    - index.php

Kedua, kita buat folder app yang berisi folder dan aplikasi utama pada MVC yang kita buat. seperti ini petanya :
#app
    * core (inti/aturan setting pada MVC)
        - routing
    *config
    * controllers 
    * views
    * models

(!) aturan peta : 
    #   : Folder utama MVC yang kita buat
    *   : Folder/subfolder di dalam folder utama
    -   : file

Peta pada MVC ini :
    1. Pusat MVC ini adalah public/index.php
    2. index.php tersebut akan memanggil init.php yang menjadi bootstraping pada  MVC ini
    3. init.php akan memanggil folder-folder dalam core sebagai aturan MVC
    4. .htaccess dibuat di dalam folder untuk mengatur akses agar hanya file yang hanya memiliki index saja yang bisa ditampilikan kepada user (untuk penjelesan lebih detail bisa kunjungi https://kuda-koding.blogspot.com/2023/06/belajar-htaccess.html)

--core/App.php--
sebagaimana dijelaskan sebelumnya, MVC ini diatur pada App.php yang di dalamnya memiliki pengaturan berikut :

    - routing diset pada fungsi route()
    - controller, method, dan params diset pada construct App.php

--core/Controller.php--
Controller.php membuat setting sebagai berikut :
    
    - view diset pada fungsi view
    - model diset pada funsi model

--core/Constants.php-- -> dipindahkan ke config
Constants.php membuat setting sebagai berikut :
    
    - membuat konstanta untuk menyimpan link

--view--
view pada mvc menggunakan layout yang dibuat di views/layout

--assets--
bootstrap yang digunakan pada mvc ini adalah versi 5.3.0
dibagi menjadi folder css, js, dan img sebagai tempat penyimpanan gambar

--database--
database yang digunakan adalah memakai driver PDO, bisa dilihat pada ModelPlayer

--app/config--
config : untuk pengaturan di dalamnya ada constant yang sebelumnya di core/constant.php
config akan connect/dipanggil oleh Database.php
jangan lupa untuk menambahkan database.php di init

--CRUD--
pada database.php ditambahkan method baru rowCount() yang menggunakan method PDO rowCount untuk identifikasi berapa data yang masuk

--Flash--
flash yang akan menjadi alert/notif ketika ada data yang berhasil/gagal diubah
flash dibuat menjadi class sendiri di dalam folder core

--ajax--
pada mvc ini digunakan ajax untuk memudahkan fitur update yang mana menjalankan modal yang sama dengan modal tambah
script nya ditulis pada public/js/script.js