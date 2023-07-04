<?php

// menjalankan session
if (!session_id()) {
    session_start();
}

// memanggil init.php yang akan memanggil seluruh aplikasi pada mvc (istilahnya inisialisi/bootstraping)
require_once '../app/init.php';

// memanggil class app
$app = new App;