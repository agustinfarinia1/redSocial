<?php
    namespace Models;

    class Publicacion
    {
        private $texto;
        private $idUsuario;
        private $idPublicacion;

        public function getId()
        {
            return $this->idPublicacion;
        }

        public function setId($idPublicacion)
        {
            $this->idPublicacion = $idPublicacion;
        }
        
        public function getTexto()
        {
            return $this->texto;
        }

        public function setTexto($texto)
        {
            $this->texto = $texto;
        }

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
    }
?>