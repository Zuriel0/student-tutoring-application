<!--Este archivo es el responsable de conectar la base de datos -->

<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'u149127938_Servicio';
        $this->user     = 'u149127938_Zurich';
        $this->password = "Anxzu_97";
        $this->charset  = 'utf8mb4';
        date_default_timezone_set("America/Mexico_City");
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            //echo "Conexxion";
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
            exit;
        }   
    }

}




?>