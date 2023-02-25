<?php

require_once 'database.php';

class Archive{
    //attributes
    public $titles;
    public $department;
    public $section;
    public $date_of_upload;
    public $sem;
    public $grade;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO archive (titles, department, section, date_of_upload, sem ,grade) VALUES
        (:titles, :department, :section, :date_of_upload, :sem, :grade);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':titles', $this->titles);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':date_of_upload', $this->date_of_upload);
        $query->bindParam(':sem', $this->sem);
        $query->bindParam(':grade', $this->grade);

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
