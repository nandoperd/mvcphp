<?php

class Flash {

    // dibuat static agar untuk memanggil flash tak perlu inisiasi
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // fungsi cek apakah file memiliki flash
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['tipe'] .  ' alert-dismissible fade show" role="alert">
            Data Player <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            unset($_SESSION['flash']); // menghapus session
        }
    }
}