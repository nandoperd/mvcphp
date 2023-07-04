<?php

// database wrapper yang akan digunakan untuk memanggil database
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        // data source name (seperti mysqli connect)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // membuat option (untuk optimasi koneksi ke database) 
        $option = [
            PDO::ATTR_PERSISTENT => true, // agar koneksi terjaga
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // cek koneksi database
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) { // catch : jika error maka
            die($e->getMessage());  // pesan error
        }
    }

    // fungsi untuk menjalankan query
    // dibuat generic, agar dapat menampung query dengan tipe apapun sesuai kebutuhan
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // fungsi binding (untuk mengidentifikasi parameternya apa)
    public function bind($param, $value, $type = null)
    {
        // menangkap data macam apa yang digunakan $type
        if (is_null($type)) {
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        // mengambil data yang sudah disaring di atas
        $this->stmt->bindValue($param, $value, $type);
        // ini dilakukan guna menghindari SQL injection karena string dipilah terlebih dahulu
    }

    // fungsi eksekusi
    public function execute()
    {
        $this->stmt->execute();
    }

    // fungsi jika data yang diambil banyak (dijadikan assoc)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // fungsi jika data yang diambil satu saja
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // method untuk cek berapa data yang masuk
    public function rowCount()
    {
        return $this->stmt->rowCount(); // rowcount fungsi PDO
    }

}