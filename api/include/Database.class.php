<?php
    class Database{
        private $host;
        private $db;
        private $user;
        private $password;
        private $port;
        private $charset;

        public function __construct(){
            $this -> host = constant('DB_HOST');
            $this -> db = constant('DB_DATABASE_NAME');
            $this -> user = constant('DB_USERNAME');
            $this -> password = constant('DB_PASSWORD');
            $this -> port = constant('DB_PORT');
            $this -> charset = constant('CHARSET');
        }

        function connect(){
            try{
                $connection = "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->db.";charset=".$this->charset;
                $options = [
                    PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES  =>  false,
                ];
                $pdo = new PDO($connection, $this->user, $this->password, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error in connect: '.$e->getMessage());
            }
        }
    }