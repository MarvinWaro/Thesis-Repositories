<?php

require_once '../class/database.php';
$db = new Database();

if(isset($_POST["course"])){
    $selectedCourse = $_POST["course"];

    // Prepare SQL statement
    $stmt = $db->connect()->prepare("SELECT * FROM groups WHERE curriculum = :curriculum");
    $stmt->bindParam(':curriculum', $selectedCourse);
    $stmt->execute();

    // Fetch result as associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return result as JSON
    echo json_encode($result);
}elseif($_POST["your_group"]){
    $selectedGroup = $_POST["your_group"];

    // Prepare SQL statement
    $stmt = $db->connect()->prepare("SELECT groups.*, faculty.firstname, faculty.lastname FROM groups INNER JOIN faculty ON faculty.id = groups.adviser_id WHERE groups.id = :groupid");
    $stmt->bindParam(':groupid', $selectedGroup);
    $stmt->execute();

    // Fetch result as associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return result as JSON
    echo json_encode($result);
}
