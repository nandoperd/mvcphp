<?php

    class Player extends Controller {
        public function index()
        {
            $data['judul'] = 'Players';
            $data['player'] = $this->model('ModelPlayer')->getData();

            $this->view('layout/header', $data);
            $this->view('player/index', $data);
            $this->view('layout/footer', $data);
        }

        public function detail($id)
        {
            $data['judul'] = 'Detail Player';
            $data['player'] = $this->model('ModelPlayer')->getDataById($id);

            $this->view('layout/header', $data);
            $this->view('player/detail', $data);
            $this->view('layout/footer', $data);
        }

        public function tambah()
        {
            if ($this->model('ModelPlayer')->tambahDataPlayer($_POST)>0) {
                Flash::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASE_URL . '/player');
                exit;
            } else {
                Flash::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASE_URL . '/player');
                exit;
            }
        }

        public function hapus($id)
        {
            if ($this->model('ModelPlayer')->hapusDataPlayer($id)>0) {
                Flash::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASE_URL . '/player');
                exit;
            } else {
                Flash::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASE_URL . '/player');
                exit;
            }
        }

        public function getUbah()
        {
            // membungkus data ke dalam json
            echo json_encode($this->model('ModelPlayer')->getDataById($_POST['id'])); 
        }

        public function ubah()
        {
            if ($this->model('ModelPlayer')->ubahDataPlayer($_POST)>0) {
                Flash::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASE_URL . '/player');
                exit;
            } else {
                Flash::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASE_URL . '/player');
                exit;
            }
        }

        public function cari()
        {
            $data['judul'] = 'Players';
            $data['player'] = $this->model('ModelPlayer')->cariData();

            $this->view('layout/header', $data);
            $this->view('player/index', $data);
            $this->view('layout/footer', $data);
        }
    }