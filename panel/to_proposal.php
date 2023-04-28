<?php

include_once '../class/student.class.php';

$student = new Student();

if(isset($_POST["submit"])){
    $groupid = $_POST["groupnum"];
    $selectedTitle = $_POST["type"];
    $comments = $_POST["comment"];

    $counter = 1;
    foreach ($comments as $key => $value) {
        $student->add_panel_comment($groupid, $counter, $value);
        if($counter == intval($selectedTitle)){
            $student->update_title($groupid, $counter, "To Proposal");
        }
        else {
            $student->update_title($groupid, $counter, "Rejected");
        }
        $counter++;
    }

    header("location: bscs.php");
}