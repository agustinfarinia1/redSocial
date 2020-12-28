<?php

namespace DAODB;

use Interfaces\IPublicacionesDAO as IPublicacionesDAO;
use DAODB\Connection as Connection;
use Models\Exception as Exception;
use PDO;
use Models\Publicacion as Publicacion;

class PublicacionesDAO implements IPublicacionesDAO
{
    private $connection;
    private $tableName = "publicaciones";

    public function add(Publicacion $newPublicacion)
    {


        $query = "INSERT INTO publicaciones (id_user, texto) VALUES (:id_user, :texto)";

        $parameters['id_user'] = $newPublicacion->getIdUsuario();
        $parameters['texto'] = $newPublicacion->getTexto();

        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {
           
            throw $ex;
        }
    }

    public function getAll()
    {
        $publicaciones = array();

        $query = "SELECT id_publicacion, id_user, texto, respuesta FROM " . $this->tableName;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query);

        foreach($results as $row)
        {
            $publicacion = new Publicacion();
            $publicacion->setId($row["id_publicacion"]);
            $publicacion->setIdUsuario($row["id_user"]);
            $publicacion->setTexto($row["texto"]);
            array_push($publicaciones, $publicacion);
        } 
        
        return $publicaciones;
    }
    /* NO LO IMPLEMENTE PERO EL MODELO SERIA ASI

    public function delete($email)
    {

        $query = "DELETE FROM users WHERE email = :email";

        $parameters['email'] = $email;

        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {

            throw $ex;
        }
    }
    */
}


?>
