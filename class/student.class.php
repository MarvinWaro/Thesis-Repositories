<?php

require_once 'database.php';

class Student{
    //attributes

    public $firstname;
    public $middle_name;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $course;
    public $year_and_section;
    public $sem;
    public $school_year;
    public $your_adviser;
    public $your_group;
    public $type;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO student (firstname, middle_name, lastname,  email, username, password, course, year_and_section, sem, school_year, your_adviser, your_group, type) VALUES
        (:firstname, :middle_name, :lastname, :email, :username, :password, :course, :year_and_section, :sem, :school_year, :your_adviser, :your_group, :type);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':course', $this->course);
        $query->bindParam(':year_and_section', $this->year_and_section);
        $query->bindParam(':sem', $this->sem);
        $query->bindParam(':school_year', $this->school_year);
        $query->bindParam(':your_adviser', $this->your_adviser);
        $query->bindParam(':your_group', $this->your_group);
        $query->bindParam(':type', $this->type);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit_student(){
        $sql = "UPDATE student SET firstname=:firstname, middle_name=:middle_name, lastname=:lastname, email=:email, username=:username, password=:password, course=:course, your_adviser=:your_adviser, your_group=:your_group, year_and_section=:year_and_section, sem=:sem, school_year=:school_year ,type=:type WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':course', $this->course);
        $query->bindParam(':year_and_section', $this->year_and_section);
        $query->bindParam(':sem', $this->sem);
        $query->bindParam(':your_adviser', $this->your_adviser);
        $query->bindParam(':your_group', $this->your_group);
        $query->bindParam(':school_year', $this->school_year);
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
        $sql = "SELECT * FROM student WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM student WHERE id = :id;";
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
        $sql = "SELECT * FROM student ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show_bscs(){
        $sql = "SELECT * FROM student WHERE course = 'BSCS';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show_bsit(){
        $sql = "SELECT * FROM student WHERE course = 'BSIT';";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
