
<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');
$postId = $_GET['post_id'];
 echo $postId . "<br>";
$sqlL = "SELECT down_count FROM post_file WHERE post_id = $postId ";
$resLike = mysqli_query($conn, $sqlL);

	while($res = mysqli_fetch_array($resLike)) 
					{					
						$likeAr = $res['down_count'];
						echo $likeAr. "<br>" ; 
					}
					
$dwCou = incre_dislike($likeAr);
echo $dwCou."<br>";

//incre funtion
function incre_dislike($nu) 
{
	$nuF = $nu + 1;
	return $nuF;
}


//update in db

$sqlAd = "UPDATE post_file  SET down_count='$dwCou' WHERE  post_id = '$postId'";
$resAdup = mysqli_query($conn,$sqlAd);


	header("Location: newsfeed.php");
	
?>
<html>
<head>

</head>
<body>

</body>
</html>