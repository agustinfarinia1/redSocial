<?php
    namespace Interfaces;

    use Models\Publicacion as Publicacion;

    interface IPublicacionesDAO
    {
        function getAll();

        function add(Publicacion $newPublicacion);

        //function delete($idPublicacion);
    }
?>