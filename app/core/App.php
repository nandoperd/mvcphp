<?php

    class App {
        // membuat properti dan isi defaultnya
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];
        public function __construct()
        {
            $url = $this->route();
            
            // controller
            // set url yang dikirimkan agar menjadi controller
            if(file_exists('../app/controllers/' . $url[0] . '.php')) // cek apakah url yang dikirimkan ada pada controller
            {
                $this -> controller = $url[0]; // menjadikan url yang dikirimkan menjadi controller baru
                unset($url[0]); // menghapus url yang dikirmkan pertama [0] untuk dijadikan controller
            }

            // instansiasi controller untuk membuat nilai controller baru
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // method
            // menjadikan url yang dikirimkan (url kedua) agar menjadi method
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // params
            // menjadikan url setelah method sebagai array(params) untuk dieksekusi
            if (!empty($url)) {
                $this->params = array_values($url); // array values untuk mengambil data yang diisi pada url
            }

            // menjalankan controller, method, dan params
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function route()
        {
            if (isset($_GET['url'])) {
                // menghapus '/' pada url yang dikirim
                $url = rtrim($_GET['url'], '/');
                // membersihkan url dari karakter lain-lain
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // memecah url dengan '/'
                $url = explode('/', $url);
                return $url;
            }
        }
    }