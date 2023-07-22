<?php
// Inialize session
session_start();

// Include database connection settings
include('./dbconn.php');

if(isset($_POST['add'])){
	
	/* capture values from HTML form */
	$title = $_POST['title'];
	$location = $_POST['location'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$reporter = $_POST['reporter'];
	$image_url = $_POST['image_url'];
	
	$sql= "INSERT INTO news (title, location, date, description, reporter_name, image_url)
           VALUES ('$title', '$location', '$date', '$description', '$reporter', '$image_url')";
    $result = mysqli_query($conn, $sql);
	if(!$result){
	 // Jump to indexwrong page
	//  echo "<script> alert(' P! ')</script>";
    echo"<script>location.href='../404.html'</script>";
	}
	else{
        echo "<script> alert(' Success Add new News !')</script>";
        echo"<script>location.href='../news-list.php'</script>";
			
        
	
		
	}	
}
mysqli_close($conn);
?>