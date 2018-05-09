<?php
/*
I reach now  10/5/18
reach cmt line 111 under
i check for ajax coz want to use cmt and reply
i will start after get ajax function
*/
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');

//get post id from newsfeed
if(isset($_GET['post_id']))
 {

 	$postIdGet = $_GET['post_id'];
$sqlNf = "SELECT * FROM post_file WHERE post_id = '$postIdGet' ";
$postList = mysqli_query($conn,$sqlNf);

while($res = mysqli_fetch_array($postList)) 
					{
	 	$postId = $res['post_id'];
	 	$postTxt = $res['post_text'];
	 	$postDate = $res['post_date'];
	 	$songName = $res['song_name'];
	 	$shareCo = $res['share_count'];
	 	$cmtCo = $res['cmt_count'];
	 	$upCo = $res['up_count'];
	 	$downCo = $res['down_count'];
	 	$userId = $res['user_id'];
	 	$type = $res['type'];		
	$postFrom = "DT";

}
?>
<html>
<head>
<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>
<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/newsfeedStyle.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/style.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/detailstyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script type="text/javascript">

if (screen.width <= 699) {
window.location = "mobile.newsfeed.php";
}

</script>

</head>
<body>

<div  class="tagBar"><a href="newsfeed.php"><button type="button" class="btnTag" >Back</button></a>
</div>

<div class="showPostFrame" class="detailFrame">
<?php
	//get info  from  db
		$target_dir = "http://localhost/musichub/songs/";

					//show  single post
					
		 $sqlUsr = "SELECT user_fname,user_lname FROM user_info_file WHERE user_id='$userId'";
		 		 $userName  = mysqli_query($conn,$sqlUsr);
		 		 
		 	
		 echo "<div class='showPost'><div class='PostUp' >";
 
		while($resNa = mysqli_fetch_array($userName)) 
					{
					echo "<img src='http://localhost/musichub/images/me.jpg' class='image'  alt='cute'> ".$resNa['user_fname'].$resNa['user_lname']."&nbsp; <a href='http://localhost/musichub/follow.php'>Follow</a>&nbsp;&nbsp;<button>more</button>";
					
					} 
				
 echo "
<br><div class='postDate'>".$postDate."</div>
				

<p> ".$postTxt."</p>
<p><b>Artist :  <br>Song  Name: </b>".$songName."</p>		
<audio controls>
	<source src=' ".$target_dir.$songName."' type='audio/mpeg'>	
	Your browser does not support the audio tag.
</audio>
</div><div class='PostLow'>

<div class='postAct'>&nbsp;
<a href='sharePost.php'>".$shareCo.".Share</a>&nbsp;
<a href='#'>".$cmtCo.".Comment</a>&nbsp;
<a href='up.php?post_id=".$postId."&postFrom=".$postFrom."' class='up'>".$upCo.".Up</a>&nbsp;
<a href='down.php?post_id=".$postId."&postFrom=".$postFrom."' class='down'>".$downCo.".Down</a>
</div>
</div>";
?>
//create cmt start
<div class="addPostFrame" class="well">

<input type="text" class="addPost" name="postTxt">
<input type="submit" value="Post" name="post">
</div>
<?php
$sqlcmt = "SELECT * FROM cmt_file WHERE post_id = '$postId' ";
$cmtList = mysqli_query($conn,$sqlcmt);

//cmt list show
while($res = mysqli_fetch_array($cmtList )) 
					{
						echo $res['cmt_id'].$res['user_id'];
				}
//end of cmt creator
echo"
</div>
		 		 ";

//end of if true  check
	}else {
			header("Location:newsfeed.php");
	}				
?>											


</body>
</html>