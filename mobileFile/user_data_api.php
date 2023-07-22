<?php

// Assuming you have already connected to your MySQL database in this file
require_once('./backend/dbconn.php');

$link = mysqli_connect("localhost",'root','','hazardspotterdb');

// Check if the request contains the necessary parameters using $_POST
if (isset($_POST['user_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ip_address']) && isset($_POST['user_agent'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ip_address = $_POST['ip_address'];
    $user_agent = $_POST['user_agent'];

    // Prepare the SQL query with placeholders to prevent SQL injection
    $query = "INSERT INTO user (user_id, name, email, ip_address, user_agent) 
              VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'issss', $user_id, $name, $email, $ip_address, $user_agent);

    // Execute the prepared statement
    try {
        if (mysqli_stmt_execute($stmt)) {
            // Insertion successful
            $response = array(
                'success' => true,
                'message' => 'User data saved successfully!'
            );
            echo json_encode($response);
        } else {
            // Error handling if the insertion fails
            $response = array(
                'success' => false,
                'message' => 'Error saving user data'
            );
            echo json_encode($response);
        }
    } catch (mysqli_sql_exception $ex) {
        // Catch the exception and print the query and error message for debugging
        $response = array(
            'success' => false,
            'message' => 'Error saving user data: ' . $ex->getMessage(),
            'query' => $query
        );
        echo json_encode($response);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // If any of the required parameters are missing in the request
    $response = array(
        'success' => false,
        'message' => 'Missing required parameters'
    );
    echo json_encode($response);
}

// Close the database connection
mysqli_close($link);

?>
