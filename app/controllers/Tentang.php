<?php

    class Tentang extends Controller {
        public function index()
        {
            $data['judul'] = 'Tentang';
            $data['nama'] = $this->model('ModelTentang')->getNama();
            $data['profesi'] = $this->model('ModelTentang')->getProfesi();
            
            $this->view('layout/header', $data);
            $this->view('tentang/index', $data);
            $this->view('layout/footer', $data);
        }
    }