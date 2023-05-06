<?php

require_once 'database.php';

class Faculty{
    //attributes

    public $firstname;
    public $middle_name;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $department;
    public $type;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO faculty (firstname, middle_name, lastname, email, username, password, department, type) VALUES
        (:firstname, :middle_name, :lastname, :email, :username, :password, :department, :type);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':type', $this->type);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit_faculty(){
        $sql = "UPDATE faculty SET firstname=:firstname, middle_name=:middle_name, lastname=:lastname, email=:email, username=:username, password=:password, department=:department, type=:type WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':department', $this->department);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM faculty WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM faculty WHERE id = :id;";
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
        $sql = "SELECT * FROM faculty ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function add_panel($faculty_id, $group_id){
        $sql = "INSERT INTO group_panelists (faculty_id, group_id) VALUES (:fac_id, :grp_id)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':fac_id', $faculty_id);
        $query->bindParam(':grp_id', $group_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function get_panel($group_id){
        $sql = "SELECT group_panelists.*, faculty.firstname, faculty.lastname FROM group_panelists INNER JOIN faculty ON group_panelists.faculty_id = faculty.id WHERE group_id = :grp_id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':grp_id', $group_id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function check_if_year_exist($sy){
        $sql = "SELECT * FROM school_year WHERE school_year=:sy";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sy', $sy);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function add_year($sy){
        $sql = "INSERT INTO school_year (school_year) VALUES (:sy)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':sy', $sy);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function get_schoolyear(){
        $sql = "SELECT * FROM school_year";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
