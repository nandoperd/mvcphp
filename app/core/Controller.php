<?php

    class Controller {

        // funnction view
        public function view($view, $data = []) // membuat fungsi view untuk memanggil $view dan membuat nilai default pada $data jika ada
        {
            require_once '../app/views/' . $view . '.php';
        }

        // function model
        public function model($model)
        {
            require_once '../app/models/' . $model . '.php';
            // melakukan inisiasi pada $new model
            return new $model;
        }
    }