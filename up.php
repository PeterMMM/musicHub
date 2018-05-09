
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

//if  already up or not (checking)
$sqlGU = "SELECT * FROM up_file WHERE userId ='$userId' AND postId='$postId' ";
$resGU = mysqli_fetch_array(mysqli_query($conn,$sqlGU));
$rowGU = $resGU['id'];
$rowGUid = $resGU['userId'];
$rowGUpo = $resGU['postId'];

echo "up id : ".$rowGU."<br>";
echo "up user id : ".$rowGUid."<br>";
echo "up post id : ".$rowGUpo."<br>";
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
	
	//add into UP_FILE 
	$sqlGUP = "SELECT * FROM  post_file WHERE post_id='$postId'";
$GUP = mysqli_fetch_array( mysqli_query($conn,$sqlGUP));
$up = $GUP['up_count'];		
	$sqlAU = "INSERT INTO up_file ( userId, postId) VALUES ( '$userId', '$postId' )";
echo "<br>up number : ".$up."<br>";

//mysqli_query($conn,$sqlAU);
if ($conn->query($sqlAU) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlAU . "<br>" . $conn->error;
}
	
//update into up_count in POST_FILE
$sqlUU = "UPDATE post_file SET up_count= $up +1  WHERE post_id= '$postId'";
//mysqli_query($conn,$sqlUU);
if ($conn->query($sqlUU) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlUU . "<br>" . $conn->error;
}
	header("Location: newsfeed.php");
}

	
	}else {
		
			header("Location: newsfeed.php");
	}
?>
<html>
<head>

</head>
<body>

</body>
</html>