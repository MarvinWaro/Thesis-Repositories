<?php
include_once '../class/faculty.class.php';
$faculty = new Faculty();

if(isset($_POST["submit"])){
    $groupid = $_POST["groupid"];
    $titleid = $_POST["titleid"];

    $faculty->archive_group_title($groupid);
    $faculty->archive_title($titleid);
    

    header("location: archives.php");
}