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
            $data = $query->fetchAll();
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

    function add_group($group_number, $curriculum, $adviser_id, $school_year){
        
        require 'dbconfig.php';
        $sql = "INSERT INTO groups (group_number, curriculum, adviser_id, school_year) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            ?>
                <script>
                    alert("Something Went Wrong!");
                    window.location.href="../admin/add_group.php";
                </script>
            <?php
            }

        mysqli_stmt_bind_param($stmt, "ssss", $group_number, $curriculum, $adviser_id, $school_year);
        mysqli_stmt_execute($stmt);
        $lastID = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);

        $this->add_group_files($group_number, $lastID, 1);
        $this->add_group_files($group_number, $lastID, 2);
        $this->add_group_files($group_number, $lastID, 3);
    }

    function add_group_files($group_number, $lastID, $titleNumber) {
        $sql = "INSERT INTO group_titles (group_id, group_number, title_number) VALUES (:last_group_id, :group_number, :title_number)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':last_group_id', $lastID);
        $query->bindParam(':group_number', $group_number);
        $query->bindParam(':title_number', $titleNumber);
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

    function show_group($group_id){
        $sql = "SELECT * FROM group_titles WHERE group_id = :groupid";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupid', $group_id);
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

    function check_if_group_exist($groupnum, $curriculum, $sy) {
        $sql = "SELECT * FROM groups WHERE group_number=:groupnum AND curriculum=:curriculum AND school_year=:sy";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':groupnum', $groupnum);
        $query->bindParam(':curriculum', $curriculum);
        $query->bindParam(':sy', $sy);
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

    function add_panel_comment($group_id, $titleNumber, $comment){
        $sql = "UPDATE group_titles SET panel_comment = :comment WHERE group_id = :id AND title_number = :titleNumber";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $group_id);
        $query->bindParam(':titleNumber', $titleNumber);
        $query->bindParam(':comment', $comment);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function update_title($group_id, $titleNumber, $status){
        $sql = "UPDATE group_titles SET status = :status WHERE group_id = :id AND title_number = :titleNumber";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $group_id);
        $query->bindParam(':titleNumber', $titleNumber);
        $query->bindParam(':status', $status);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function add_proposed_title($titleid, $title){
        $sql = "INSERT INTO proposed_titles (group_titles_id, title) VALUES (:titleid, :title)";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':titleid', $titleid);
        $query->bindParam(':title', $title);
        if($query->execute()){
            return true;
        } 
        else {
            return false;
        }
    }

    function get_accepted($id){
        $sql = "SELECT * FROM proposed_titles WHERE group_titles_id = :id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_proposed_titles(){
        $sql = "SELECT group_titles.*, groups.group_number, groups.curriculum, groups.adviser_id, groups.school_year FROM group_titles INNER JOIN groups ON groups.id = group_titles.group_id WHERE status = 'Accepted'";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_rejected_titles(){
        $sql = "SELECT group_titles.*, groups.group_number, groups.curriculum, groups.adviser_id, groups.school_year FROM group_titles INNER JOIN groups ON groups.id = group_titles.group_id WHERE status = 'Rejected'";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_grouparchived_titles($id){
        $sql = "SELECT group_titles.*, groups.group_number, groups.curriculum, groups.adviser_id, groups.school_year FROM group_titles INNER JOIN groups ON groups.id = group_titles.group_id WHERE group_titles.group_id = :id AND status = 'Archived'";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_group_proposed_title($id){
        $sql = "SELECT group_titles.*, groups.adviser_id, groups.school_year FROM group_titles INNER JOIN groups ON groups.id = group_titles.group_id WHERE group_titles.group_id = :id AND group_titles.status = 'Accepted';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_group_archived_title($id){
        $sql = "SELECT group_titles.*, groups.adviser_id, groups.school_year FROM group_titles INNER JOIN groups ON groups.id = group_titles.group_id WHERE group_titles.group_id = :id AND group_titles.status = 'Archived';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function update_proposed_title($id, $abstract, $filename){
        $sql = "UPDATE proposed_titles SET abstract = :abstract, file = :filename WHERE group_titles_id = :id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        $query->bindParam(':abstract', $abstract);
        $query->bindParam(':filename', $filename);
        if($query->execute()){
            return true;
        } 
        else {
            return false;
        }
    }

    function get_toarchive_title($id){
        $sql = "SELECT * FROM proposed_titles WHERE group_titles_id = :id";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function get_archived_titles(){
        $sql = "SELECT proposed_titles.*, group_titles.group_id FROM proposed_titles INNER JOIN group_titles ON group_titles.id = proposed_titles.group_titles_id WHERE proposed_titles.status = 'Archived'";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    
}

?>
