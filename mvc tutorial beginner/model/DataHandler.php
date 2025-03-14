<?php
    class DataHandler{
        private $dbh;
        private $host;
        private $dbdriver;
        private $dbname;
        private $username;
        private $password;
        private $sth;

        public function __construct($host, $dbdriver, $dbname, $username, $password)
        {
            $this->host = $host;
            $this->dbdriver = $dbdriver;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;

            try {
                $this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return true;
            } catch (PDOException $e) {
                echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
            }
        }

        public function __destruct()
        {
            $this->dbh = null;
        }

        public function createData($sql){
            $this->dbh->query($sql);
            return $this->lastInsertId();
        }

        public function readData($sql){
            //return $this->query($sql);
            return $this->dbh->query($sql,PDO::FETCH_ASSOC);
        }
        public function readAllData($sql){
            // $this->query($sql);
            return $this->dbh->query($sql,PDO::FETCH_ASSOC);
        }
        public function updateData($sql){
            $this->query($sql);
            return $this->sth->rowCount();
        }
        public function deleteData($sql){
            $sth = $this->dbh->query($sql);
            return $sth->rowCount();
        }
        public function query($query){  
            $this->sth = $this->dbh->prepare($query);
            return $this->sth->execute();    
        }
        public function lastInsertId(){  
            return $this->dbh->lastInsertId();  
        }
        public function countPages($sql,$item_per_page){
            $this->query($sql);
            $get_total_rows = $this->sth->rowCount();
            
    
            //breaking total records into pages
            return ceil($get_total_rows/$item_per_page);
            // return $pages;
        }
    }
?>