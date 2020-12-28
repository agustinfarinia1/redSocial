<?php
    namespace Controllers;

    use DAODB\PublicacionesDAO as PublicacionesDAO;
    use DAODB\UserDAO as UserDAO;
    use Models\Publicacion as Publicacion;
    use Controllers\UtilsController as UtilsController;

    class PublicacionController
    {
        private $publicacionDAO;
        private $userDAO;
        private $utils;

        public function __construct()
        {
            $this->publicacionDAO = new PublicacionesDAO();
            $this->userDAO = new UserDAO();
            $this->utils = new UtilsController();
        }

        public function showMuro(){
            $publicaciones = array();
            $publicaciones = $this->publicacionDAO->getAll();
            require_once(VIEWS_PATH."muro.php"); 
        }

        public function showVistaAdmin(){
            require_once(VIEWS_PATH."vistaAdmin.php"); 
        }

        public function addPublicacion($texto){
            if($_POST){
                $publicacion = new Publicacion();
                $publicacion->setTexto($texto);
                $publicacion->setIdUsuario($_SESSION['loggedUser']->getid());
                $this->publicacionDAO->add($publicacion);
                header("Location:" . FRONT_ROOT . 'Publicacion/showMuro' );
            }
        }

            
        public function buscarPersona($busqueda){
            $personas = array();
            $flag = 0;
            $personas = $this->userDAO->buscarUserPorNombreYApellido($busqueda);
            foreach($this->userDAO->buscarUserPorNombreOApellido($busqueda) as $persona){
                $flag = 0;
                foreach($personas as $filtro){
                    if($filtro->getName()." ".$filtro->getLastName() == $persona->getName()." ".$persona->getLastName()){
                        $flag = 1;
                    }
                }
                if($flag == 0){
                    array_push($personas,$persona);
                }
            }
            require_once(VIEWS_PATH."buscarPersona.php"); 
        }

        public function showPerfil(){
            require_once(VIEWS_PATH."paginaPersona.php"); 
        }
    }
    
?>