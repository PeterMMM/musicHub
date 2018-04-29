<?php

session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');


	if(isset($_POST['post'])) 
	{
	$songName =mysqli_real_escape_string( $conn,$_FILES['song']['name']);
	$target_dir = $_SERVER['DOCUMENT_ROOT'].'/musichub/songs/';
	$target_file = $target_dir . $songName;


	$postTxt = mysqli_real_escape_string( $conn,$_POST['postTxt']);
	$postDate = date("Y-m-d");
	
	$postUserFname = $_SESSION['userFname'];
	$postUserLname = $_SESSION['userLname'];
	$postType = "ownPost"; // ownPost , otrPost	

$sql = "SELECT user_id FROM  user_info_file WHERE user_fname = '$postUserFname' AND user_lname = '$postUserLname'";

$result = mysqli_query($conn,$sql);
	

 echo"$songName <br> $postTxt <br> $postUserFname <br> $postUserLname <br> ";
//get user id who p
		while($res = mysqli_fetch_array($result))
		{
						$userId =  $res['user_id'] ; 
		} 
		echo $userId;
		$sqlAd = "INSERT INTO  post_file (post_text,post_date,song_name,user_id,type)
		 VALUES ('$postTxt','$postDate','$songName','$userId','$postType') ";
		  	if($conn->query($sqlAd)=== TRUE) 
	 	{
	 		$msg = "New info is added successfully.";
	 		echo "<br>Error: <br>" .$msg;
	 			//upload file
	 			echo $_FILES["song"]["error"];
	move_uploaded_file($_FILES['song']['tmp_name'], $target_dir.$_FILES['song']['name']);

	 		header("Location: newsfeed.php");
	 	} else {
    echo "<br>Error: <br>" . $conn->error;
}
		 
		 
}else {
	
	echo"Loading...";
}
?>
