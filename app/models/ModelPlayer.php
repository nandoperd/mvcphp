<?php

    // membuat model yang connect ke database.php
    class ModelPlayer {

        private $table = 'players'; // deklarasi nama tabel
        private $db; // membuat value db untuk connect ke database

        public function __construct()
        {
            $this->db = new Database; // inisiasi ke database.php
        }

        // di bawah ini adalah model tanpa connect ke database.php
        // membuat data array di dalam array (untuk banyak data)
        // isi data secara manual (melalui code pada model)
        // private $data = [
        //     [
        //         "nama" => "Ibrahimovic",
        //         "club" => "Milan",
        //         "posisi" => "ST",
        //     ],
        //     [
        //         "nama" => "Benzema",
        //         "club" => "Madrid",
        //         "posisi" => "CF",
        //     ],
        //     [
        //         "nama" => "Chukwueze",
        //         "club" => "Villareal",
        //         "posisi" => "RM",
        //     ]
        // ];

        // memanggil data dari MySQL menggunakan driver PDO
        //private $dbh;  // database handler
        //private $stmt; // statement

        // public function __construct()
        // {
        //     // data source name (seperti mysqli connect)
        //     $dsn = 'mysql:host=localhost;dbname=mvc';

        //     // cek koneksi database
        //     try {
        //         $this->dbh = new PDO($dsn, 'root', '');
        //     } catch (PDOException $e) { // catch : jika error maka
        //         die($e->getMessage());  // pesan error
        //     }
        // }

        // model di atas dipindahkan pada database.php guna perapihan peta MVC

        public function getData()
        {
            // inisiasi query ke database.php
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet(); // memanggil fungsi resultSet pada database.php

            // return $this->data; // memanggil data secara manual (yang diisi model)

            // memanggil query menggunakan PDO
            // $this->stmt = $this->dbh->prepare('SELECT * FROM players');
            // $this->stmt->execute();                         // mengeksekusi data
            // return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // mengambil data sebagai array assoc menggunakan PDO
            
            // fungs di atas juga sudah dibuat diconnect ke database.php
        }

        public function getDataById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id',$id); // memanggil fungsi bind di database.php
            return $this->db->single(); // memanggil fungsi single (karena datanya hanya satu(id))
        }

        public function tambahDataPlayer($data)
        {
            $query = "INSERT INTO players VALUES
                      ('', :nama, :club, :posisi)";
            
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('club', $data['club']);
            $this->db->bind('posisi', $data['posisi']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function hapusDataPlayer($id)
        {
            $query = "DELETE FROM players WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function ubahDataPlayer($data)
        {
            $query = "UPDATE players SET
                        nama = :nama,
                        club = :club,
                        posisi = :posisi
                      WHERE id = :id";
            
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('club', $data['club']);
            $this->db->bind('posisi', $data['posisi']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function cariData()
        {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM players WHERE nama LIKE :keyword";
            $this->db->query($query);
            // parameter ditaruh di bawah sini karena mvc ini menggunakan PDO (pada binding) jadi tidakn bisa ditulis langsung di atas
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
        }
    }