<?php
    namespace Controllers;

    class HomeController
    {

        public function Index($message = "")
        {             
            if(isset($_SESSION["loggedUser"])){
                if($_SESSION["loggedUser"]->getRol() == 1){
                    header("Location:" . FRONT_ROOT . 'Vista/showVistaAdmin' );
                }else{
                    header("Location:" . FRONT_ROOT . 'Publicacion/showMuro' );
                }
            }

            require_once(VIEWS_PATH."home.php"); 
        }

    }
?>