<?php
// Inialize session
session_start();

// Include database connection settings
include('./dbconn.php');

if(isset($_POST['save'])){
	
	/* capture values from HTML form */
	$news_id = $_POST['news_id'];
	$title = $_POST['title'];
	$location = $_POST['location'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$reporter = $_POST['reporter'];
	
	$sql= "UPDATE news SET title='$title', location='$location', date='$date', description='$description', reporter_name='$reporter'
            WHERE news_id='$news_id'";
           
    $result = mysqli_query($conn, $sql);
	if(!$result){
	 // Jump to indexwrong page
	//  echo "<script> alert(' P! ')</script>";
    echo"<script>location.href='../404.html'</script>";
	}
	else{
        echo "<script> alert(' Success Updated ".$title." news !')</script>";
        echo"<script>location.href='../news-list.php'</script>";
			
        
	
		
	}	
}
mysqli_close($conn);
?>