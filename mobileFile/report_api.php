<?php
// Assuming you have already connected to your MySQL database in this file
require_once('./backend/dbconn.php');

$link = mysqli_connect("localhost",'root','','hazardspotterdb');

// Check if the request contains the necessary parameters using $_POST
if (isset($_POST['date']) && isset($_POST['comments']) && isset($_POST['news_id']) && isset($_POST['user_id'])) {
    $date = $_POST['date'];
    $comments = $_POST['comments'];
    $news_id = $_POST['news_id'];
    $user_id = $_POST['user_id'];

    // Prepare the SQL query with placeholders to prevent SQL injection
    $query = "INSERT INTO comments (date, comments, news_id, user_id) 
              VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssii", $date, $comments, $news_id, $user_id);



    
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Insertion successful
        // var_dump($response);
        $response = array(
            'success' => true,
            'message' => 'Report submitted successfully!'
        );
    } else {
        // Error handling if the insertion fails
        $response = array(
            'success' => false,
            'message' => 'Error submitting report'
        );
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // If any of the required parameters are missing in the request
    $response = array(
        'success' => false,
        'message' => 'Missing required parameters'
    );
}

// Close the database connection
mysqli_close($link);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
