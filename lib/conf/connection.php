<?php

    class Connection
    {
        private $server;
        private $user;
        private $pass;
        private $port;
        private $database;
        private $link;

        function __construct(){
            $this->setConnect();
            $this->connect();
        }

        private function setConnect(){
            require_once 'conf.php';
            $this->server=$server;
            $this->user=$user;
            $this->pass=$pass;
            $this->port=$port;
            $this->database=$database;

        

        }

        private function connect(){
            $this->link=pg_connect(
                "host='".$this->server."'".
                "port='".$this->port."'".
                "dbname='".$this->database."'".
                "user='".$this->user."'".
                "password='".$this->pass."'"
            );

            if (!$this->link){
                die(pg_errormessage($this->link));
            }
        }
        public function getConnect(){
            return $this->link;
        }
        public function close(){
            pg_close($this->link);
        }
    }

?>