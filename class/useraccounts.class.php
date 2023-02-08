<?php

require_once 'database.php';

class Account{
    //attributes
    public $username;
    public $password;
    public $type;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO useraccounts (username, password, type) VALUES
        (:username, :password, :type);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':type', $this->type);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }


    function fetch($record_id){
        $sql = "SELECT * FROM useraccounts WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM useraccounts WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM useraccounts ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
