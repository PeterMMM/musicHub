
<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');

//check come from post or not
if(isset($_GET['post_id']))
 {
 	echo $_SESSION['userId']."<br>";
$postId = $_GET['post_id'];
$postFrom = $_GET['postFrom'];
$userId = $_SESSION["userId"];
 echo "user id : ". $userId."<br>";
 echo "post id :".$postId."<br>";
 
//if  already up or not (checking)
$sqlGU = "SELECT * FROM down_file WHERE userId ='$userId' AND postId='$postId' ";
$resGU = mysqli_fetch_array(mysqli_query($conn,$sqlGU));
$rowGU = $resGU['id'];
$rowGUid = $resGU['userId'];
$rowGUpo = $resGU['postId'];

//if already up
//redirect to newsfeed page
//not work with up function
if(isset($rowGU)) 
{
	echo "EXIT ";
if($postFrom=="DT" ){
echo "FROM DT";
		header("Location: postDetail.php?post_id=".$postId);
}elseif($postFrom=="NF") {
	header("Location: newsfeed.php");
	echo "FROM NF";
}
}else {
	echo"not EXIT";
	//if not already up
	// it start work
	
	//add into DOWN_FILE 
	$sqlGD = "SELECT * FROM  post_file WHERE post_id='$postId'";
$GUD = mysqli_fetch_array( mysqli_query($conn,$sqlGD));
$down = $GUD['down_count'];		
	$sqlAD = "INSERT INTO down_file ( userId, postId) VALUES ( '$userId', '$postId' )";
echo "<br>down number : ".$down."<br>";

//mysqli_query($conn,$sqlAU);
if ($conn->query($sqlAD) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlAD . "<br>" . $conn->error;
}
	
	
//update into up_count in POST_FILE
$sqlUD = "UPDATE post_file SET down_count= $down +1  WHERE post_id= '$postId'";
//mysqli_query($conn,$sqlUU);
if ($conn->query($sqlUD) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlUD . "<br>" . $conn->error;
}
echo"Reach finish";
	header("Location: newsfeed.php");
}

	
	}else {
		echo"reach else";
			header("Location: newsfeed.php");
	}
?>
<html>
<head>

</head>
<body>

</body>
</html>