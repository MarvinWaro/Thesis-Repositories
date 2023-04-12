<?php
    require_once '../class/student.class.php';

session_start();
// Check if the request is a POST request and that the 'hotel_id' parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Get the hotel ID from the POST data
    // Delete the hotel record from the database
    $student = new Student;
    $result = $student->delete_group($_POST['id']);

    if ($result) {
        // The hotel was successfully deleted, so return a success message
        $response = array(
            'status' => 'success',
            'message' => 'Group successfully deleted.'
        );
        echo json_encode($response);
    } else {
        // There was an error deleting the hotel, so return an error message
        $response = array(
            'status' => 'error',
            'message' => 'There was an error deleting the Group.'
        );
        echo json_encode($response);
    }
}

?>
