<?php
    require_once '../class/faculty.class.php';

session_start();
// Check if the request is a POST request and that the 'hotel_id' parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Get the hotel ID from the POST data
    // Delete the hotel record from the database
    $faculty = new Faculty;
    $result = $faculty->delete($_POST['id']);

    if ($result) {
        // The hotel was successfully deleted, so return a success message
        $response = array(
            'status' => 'success',
            'message' => 'Faculty successfully deleted.'
        );
        echo json_encode($response);
    } else {
        // There was an error deleting the hotel, so return an error message
        $response = array(
            'status' => 'error',
            'message' => 'There was an error deleting the faculty.'
        );
        echo json_encode($response);
    }
}

?>


