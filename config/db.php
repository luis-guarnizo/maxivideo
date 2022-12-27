<?php
    class db{
        private $host = "localhost";
        private $dbname = "video";
        private $user = "root";
        private $password = "";

        public function conexion(){
            try {
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user, $this->password);
                return $PDO;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
            
        }
    }
    /* $obj= new db();
    print_r($obj -> conexion()); */
?>