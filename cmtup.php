
<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');

//check come from post or not
if(isset($_GET['cmt_id']))
 {
 	echo $_SESSION['userId']."<br>";
$cmtId = $_GET['cmt_id'];
$postFrom = $_GET['postFrom'];
$userId = $_SESSION["userId"];

//add into UP_FILE 
	$sqlGUP = "SELECT * FROM  cmt_file WHERE cmt_id='$cmtId'";
$GUP = mysqli_fetch_array( mysqli_query($conn,$sqlGUP));
$up = $GUP['cmt_up_co'];
$postId = $GUP['post_id'];		
	

//if  already up or not (checking)
$sqlGU = "SELECT * FROM cmt_up_file WHERE user_id ='$userId' AND cmt_id='$cmtId' ";
$resGU = mysqli_fetch_array(mysqli_query($conn,$sqlGU));
$rowGU = $resGU['id'];
$rowGUid = $resGU['user_id'];
$rowGUpo = $resGU['cmt_id'];

echo "up id : ".$rowGU."<br>";
echo "up user id : ".$rowGUid."<br>";
echo "up cmt id : ".$rowGUpo."<br>";
//if already up
//redirect to newsfeed page
//not work with up function
if(isset($rowGU)) 
{
	echo "EXIT ";
if($postFrom=="DT" ){
echo "FROM DT";
		header("Location: postDetail.php?post_id=".$postId);
}
}else {
	echo"not EXIT";
	//if not already up
	// it start work
	

	$sqlAU = "INSERT INTO cmt_up_file ( user_id, cmt_id) VALUES ( '$userId', '$cmtId' )";
echo "<br>up number : ".$up."<br>";

//mysqli_query($conn,$sqlAU);
if ($conn->query($sqlAU) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlAU . "<br>" . $conn->error;
}
	
//update into up_count in POST_FILE
$sqlUU = "UPDATE cmt_file SET cmt_up_co = $up +1  WHERE cmt_id= '$cmtId'";
//mysqli_query($conn,$sqlUU);
if ($conn->query($sqlUU) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlUU . "<br>" . $conn->error;
}
	header("Location: postDetail.php?post_id=$postId");
}

	
	}else {
		
			header("Location: postDetail.php?post_id=$postId");
	}
?>
<html>
<head>

</head>
<body>

</body>
</html>