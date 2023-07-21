<?php
	include('dbconn.php');
	
	$user_id=$_GET['user_id'];
	
	$delete = "DELETE FROM user WHERE user_id='$user_id'";
	$result = mysqli_query($conn, $delete) or die ("Error: " . mysqli_error($conn));
	//echo $delete;
	
	if(!$result){
	 // Jump to indexwrong page
	//  echo "<script> alert(' P! ')</script>";
    echo"<script>location.href='../404.html'</script>";
	}
	else{
        echo "<script> alert(' Success Deleted User !')</script>";
        echo"<script>location.href='../users-list.php'</script>";
	}	
	
?>