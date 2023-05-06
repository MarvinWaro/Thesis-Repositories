<?php
include_once '../class/faculty.class.php';
$faculty = new Faculty();

if(isset($_POST["submit"])){
    $panel1 = $_POST["panel_one"];
    $panel2 = $_POST["panel_two"];
    $panel3 = $_POST["panel_three"];
    
    $group_id = $_POST["group_id"];
    $course = $_POST["course"];

    $faculty->add_panel($panel1, $group_id);
    $faculty->add_panel($panel2, $group_id);
    $faculty->add_panel($panel3, $group_id);

    header("location: advisee.php?groupnum=" . $group_id . "&course=" . $course);
}