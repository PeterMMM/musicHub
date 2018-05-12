<?php

session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');


	if(isset($_POST['post'])) 
	{

//get cmtTxt
	$cmtTxt = mysqli_real_escape_string( $conn,$_POST['cmtTxt']);
//	$postDate = date("Y-m-d");

//get postId
$postId = $_POST['postId'];
	
	//get cmt owner name
	$postUserFname = $_SESSION['userFname'];
	$postUserLname = $_SESSION['userLname'];
		

$sql = "SELECT user_id FROM  user_info_file WHERE user_fname = '$postUserFname' AND user_lname = '$postUserLname'";

$result = mysqli_query($conn,$sql);
	
	
	//update cmt co
$sqlCM = "SELECT * FROM  post_file WHERE post_id='$postId'";
$CU = mysqli_fetch_array( mysqli_query($conn,$sqlCM));
$cmtCo = $CU['cmt_count'];		
	
	
	

 echo"$postId <br> $cmtTxt <br> $postUserFname <br> $postUserLname <br> ";
//get user id who p
		while($res = mysqli_fetch_array($result))
		{
						$userId =  $res['user_id'] ; 
		} 
		echo $userId;
		//insert into cmt file but not cmt_id, reply_co
		$sqlAd = "INSERT INTO  cmt_file (cmt_txt,post_id,user_id)
		 VALUES ('$cmtTxt','$postId','$userId')";
		  	if($conn->query($sqlAd)=== TRUE) 
	 	{
	 		$msg = "New info is added successfully.";
	 		echo "<br>Success Msg : <br>" .$msg;
	
//set update cmt co
$sqlCU = "UPDATE post_file SET cmt_count= $cmtCo +1  WHERE post_id= '$postId'";
if ($conn->query($sqlCU) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlCU . "<br>" . $conn->error;
}

	 		header("Location: postDetail.php?post_id=$postId");
	 	} else {
    echo "<br>Error: <br>" . $conn->error;
}
		 
		 
}else {
	
	echo"Loading...";
}
?>
