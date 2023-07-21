<?php
// Inialize session
session_start();

// Include database connection settings
include('./dbconn.php');

if(isset($_POST['save'])){
	
	/* capture values from HTML form */
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	
	
	$sql= "UPDATE user SET name='$name', email='$email', contact='$contact'
            WHERE user_id='$user_id'";
           
    $result = mysqli_query($conn, $sql);
	if(!$result){
	 // Jump to indexwrong page
	//  echo "<script> alert(' P! ')</script>";
    echo"<script>location.href='../404.html'</script>";
	}
	else{
        echo "<script> alert(' Success Updated ".$name." user !')</script>";
        echo"<script>location.href='../users-list.php'</script>";
			
        
	
		
	}	
}
mysqli_close($conn);
?>