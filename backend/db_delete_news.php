<?php
	include('dbconn.php');
	
	$news_id=$_GET['news_id'];
	
	$delete = "DELETE FROM news WHERE news_id='$news_id'";
	$result = mysqli_query($conn, $delete) or die ("Error: " . mysqli_error($conn));
	//echo $delete;
	
	if(!$result){
	 // Jump to indexwrong page
	//  echo "<script> alert(' P! ')</script>";
    echo"<script>location.href='../404.html'</script>";
	}
	else{
        echo "<script> alert(' Success Deleted news !')</script>";
        echo"<script>location.href='../news-list.php'</script>";
	}	
	
?>