<?php

// Assuming you have already connected to your MySQL database in this file
require_once('./backend/dbconn.php');

$link = mysqli_connect("localhost",'root','','hazardspotterdb');

// Retrieve news data from the "news" table
$query = "SELECT * FROM news";
$result = mysqli_query($link, $query);

if (!$result) {
    // Error handling if the query fails
    $response = array('success' => false, 'message' => 'Failed to fetch news data');
    echo json_encode($response);
} else {
    // Fetch news data and store it in an array
    $newsData = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $newsData[] = array(
            'news_id' => $row['news_id'],
            'title' => $row['title'],
            'location' => $row['location'],
            'description' => $row['description'],
            'date' => $row['date'],
            // 'image_url' => $row['image_url'],
            'reporter_name' => $row['reporter_name']

        );
    }

    // Return news data in JSON format
    $response = array('success' => true, 'data' => $newsData);
    echo json_encode($response);
}

?>
