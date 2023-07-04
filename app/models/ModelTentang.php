<?php

    class ModelTentang {
        private $nama = 'nandoperd';
        private $profesi = 'Full Stack Developer';

        public function getNama()
        {
            return $this->nama;
        }

        public function getProfesi()
        {
            return $this->profesi;
        }
    }