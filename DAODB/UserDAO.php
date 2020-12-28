<?php

namespace DAODB;

use Interfaces\IUserDAO as IUserDAO;
use DAODB\Connection as Connection;
use Models\Exception as Exception;
use PDO;
use Models\User as User;

class UserDAO
{
    private $connection;
    private $tableName = "users";

    public function GetByEmail($email)
    {
        $user = null;

        $query = "SELECT id_user,name, lastname, email, password, rol FROM " . $this->tableName . " WHERE (email = :email)";

        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query, $parameters);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setPassword($row["password"]);
            $user->setRol($row["rol"]);
        }

        return $user;
    }

    public function getAll()
    {
        $users = array();

        $query = "SELECT id_user,name, lastname, email, password, rol FROM " . $this->tableName;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setRol($row["rol"]);
            array_push($users, $user);
        } 
        
        return $users;
    }

    
    public function GetById($idUser)
    {
        $user = null;

        $query = "SELECT id_user,name, lastname, email, password, rol FROM " . $this->tableName . " WHERE (id_user = :id_user)";

        $parameters["id_user"] = $idUser;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query, $parameters);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setPassword($row["password"]);
            $user->setRol($row["rol"]);
        }

        return $user;
    }

    public function add($_user)
    {


        $query = "INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";

        $parameters['name'] = $_user->getName();
        $parameters['lastname'] = $_user->getLastName();
        $parameters['email'] = $_user->getEmail();
        $parameters['password'] = $_user->getPassword();


        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {
           
            throw $ex;
        }
    }

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

    public function buscarUserPorNombreYApellido($busqueda){
        $users = array();
        $query = "SELECT id_user,name,lastname,email,rol
        FROM
        " . $this->tableName . "
        where ";
        $i = 0;
        foreach(explode(" ",$busqueda) as $parteBusqueda){
            $query = $query."concat(name,' ',lastname) like '%".$parteBusqueda."%'";
            if(count(explode(" ",$busqueda)) - 1 > $i){
                $query = $query." and ";
            }
            $i++;
        }
        $query = $query."ORDER BY lastname";

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setRol($row["rol"]);
            array_push($users, $user);
        } 
        
        return $users;
    }

    public function buscarUserPorNombreOApellido($busqueda){
        $users = array();
        $query = "SELECT id_user,name,lastname,email,rol
        FROM
        " . $this->tableName . "
        where ";
        $i = 0;
        foreach(explode(" ",$busqueda) as $parteBusqueda){
            $query = $query."concat(name,' ',lastname) like '%".$parteBusqueda."%'";
            if(count(explode(" ",$busqueda)) - 1 > $i){
                $query = $query." or ";
            }
            $i++;
        }
        $query = $query."ORDER BY lastname";

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setRol($row["rol"]);
            array_push($users, $user);
        } 
        
        return $users;
    }
}


?>
