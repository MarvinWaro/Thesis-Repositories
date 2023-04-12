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

    function add_group($group_number, $curriculum, $adviser_id){
        
        $conn = mysqli_connect("localhost","root","","tams");
        $sql = "INSERT INTO groups (group_number, curriculum, adviser_id) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            ?>
                <script>
                    alert("Something Went Wrong!");
                    window.location.href="../admin/add_group.php";
                </script>
            <?php
            }

        mysqli_stmt_bind_param($stmt, "sss", $group_number, $curriculum, $adviser_id);
        mysqli_stmt_execute($stmt);
        $lastID = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);

        $this->add_group_files($group_number, $lastID);
    }

    function add_group_files($group_number, $lastID) {
        $sql = "INSERT INTO group_files (group_id, group_num) VALUES (:last_group_id, :group_number)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':last_group_id', $lastID);
        $query->bindParam(':group_number', $group_number);
        if($query->execute()){
            return true;
        } 
        else {
            return false;
        }
    }

    function show_all_groups(){
        $sql = "SELECT * FROM groups";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete_group($record_id){
        $sql = "DELETE FROM groups WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show_group($group_id, $curriculum){
        $sql = "SELECT * FROM group_files WHERE group_id IN (SELECT id FROM groups WHERE group_number = :groupid AND curriculum = :course)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupid', $group_id);
        $query->bindParam(':course', $curriculum);
        if($query->execute()){
            $data2 = $query->fetchAll();
        }
        return $data2;
    }

    function show_group_info($group_id){
        $sql = "SELECT * FROM groups WHERE id = :groupid;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupid', $group_id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function check_if_group_exist($groupnum, $curriculum) {
        $sql = "SELECT * FROM groups WHERE group_number=:groupnum AND curriculum=:curriculum";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupnum', $groupnum);
        $query->bindParam(':curriculum', $curriculum);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show_group_members($groupnum, $curriculum){
        $sql = "SELECT * FROM student WHERE your_group=:groupnum AND course=:curriculum";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupnum', $groupnum);
        $query->bindParam(':curriculum', $curriculum);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_adviser($adviser_id){
        $sql = "SELECT * FROM faculty WHERE id=:adviser_id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':adviser_id', $adviser_id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_adviser_list(){
        $sql = "SELECT * FROM faculty";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>
