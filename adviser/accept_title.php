<?php

include_once '../class/student.class.php';

$student = new Student();

if(isset($_POST["submit"])){
    $groupid = $_POST["groupnum"];
    $selectedTitle = $_POST["type"];

    $counter = 1;
    while($counter < 4) {
        if($counter == intval($selectedTitle)){
            $student->update_title($groupid, $selectedTitle, "Accepted");
            foreach($student->get_group_proposed_title($groupid) as $proposed)
                $student->add_proposed_title($proposed['id'], $proposed["title"]);
        }
        else {
            $student->update_title($groupid, $counter, "Rejected");
        }
        $counter++;
    }

    header("location: accepted_titles.php");
}