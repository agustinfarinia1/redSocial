<?php
    namespace Models;

    class User
    {
        private $password;
        private $name;
        private $lastname;
        private $rol;
        private $email;
        private $idUsuario;

        public function getId()
        {
            return $this->idUsuario;
        }

        public function setId($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getLastname()
        {
            return $this->lastname;
        }

        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setRol($rol)
        {
            $this->rol = $rol;
        }

        public function getRol()
        {
            return $this->rol;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
    }
?>