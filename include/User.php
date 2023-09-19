<!--Este archivo permite comparar la informacion de incio de secion y obtener informacion del mismo -->

<?php
include_once 'DB.php';

class User extends DB{
    private $Name;
    private $Mail;
    private $ID;
    private $url;

    // verifica si el usuario y contraseña se encuentra dentro de la tabla de Users
    public function userExists($correo, $pass){
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT * FROM Users WHERE Mail = :user AND password = :pass');
        $query->execute(['user' => $correo, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($correo){ // Gusardar los datos del usuario que inicio sesion
        $query = $this->connect()->prepare('SELECT * FROM Users WHERE Mail = :user');
        $query->execute(['user' => $correo]);
        
        foreach ($query as $currentUser) {
            $this->Name = $currentUser['Name'];
            $this->Mail = $currentUser['Mail'];
            $this->ID = $currentUser['ID'];
            $this->url = $currentUser['Url'];
        }
    }

    public function getUpdate(){ // Actulizamos los damos 
        $id= $this->ID;
        $sql = $this->connect()->prepare('SELECT * FROM Users WHERE ID = :id');
        $sql->execute(['id' => $id]);

        foreach ($sql as $currentUser) {
            $this->Name = $currentUser['Name'];
            $this->Mail = $currentUser['Mail'];
            $this->url = $currentUser['Url'];
        }
    }

    public function getNombre(){ // Obtener Id usuario
        return $this->ID;
    }
    public function getUrl(){ // Obtener el url del usuario (La direccion de la imagen)
        return $this->url;
    }

    
}



?>