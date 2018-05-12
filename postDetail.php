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

<link  rel="stylesheet" href="http://localhost/musichub/css/detailstyle.css">

<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/newsfeedStyle.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/style.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script type="text/javascript">

if (screen.width <= 699) {
window.location = "mobile.newsfeed.php";
}

</script>
<style>



.wT
{
 background-color: azure;
 width: 500px;
 height: 60px;
 margin: 5px;
box-shadow: 2px 2px 2px  2px gray;
padding-right: 5px;
padding-left: 5px;
}
.wpro{
	padding-top: 5px;
	padding-left: 5px;
	color: black;
	font-family: Times;
	font-size: 10px;
	float: left;
/*background-color: blue;*/
width: 10%;
height: 100%;
}
.wproU
{
height: 70%;
width: 100%
}
.wproD
{
height: 30%;
width: 100%;
}
.wtxt
{
float: left;
/*background-color: yellow;*/
width: 80%;
height: 100%;
}
.wmore{
	padding-top: 3px;
	padding-left: 70px;
float: right;
/*background-color: green;*/
width: 20%;
height: 100%;
}
.wproBk{
		float: left;
/*background-color: lightcoral;*/
width: 90%;
height: 100%;
}
.bkUp{
float: right;
width: 100%;
height: 50%;
/*background-color: lightgreen;*/
}
.bkDown{
float: right;
width: 100%;
height: 50%;
/*background-color: lightgrey;*/
}
.wup{
padding-left: 10px;
float: left;
/*background-color: aqua;*/
width: 11%;
height: 100%;
}
.wdown{
float: left;
/*background-color: pink;*/
width: 12%;
height: 100%;

}
.wrply
{
float: left;
/*background-color: black;*/
width: 10%;
height: 100%;

}
.cmtListFrame{
/*box-shadow: 2px 2px 2px  2px gray;*/

margin-top: 0px;
		padding-bottom: 5px;
		padding-top: 0px;
		padding-right: 0px;
		padding-left: 0px;
		height: wrap;
		margin-bottom: 10px;
					background-color: white;
}
.cmtPost{
	margin: 5px;
 width: 500px;
 height: 60px;
/* box-shadow: 2px 2px 2px  2px gray;*/

					background-color: white;
}
</style>
</head>
<body>

<div  class="tagBar"><a href="newsfeed.php"><button type="button" class="btnTag" >Back</button></a>
</div>

<div class="showPostFrame" class="detailFrame">
<?php
	//get info  from  db
		$target_dir = "http://localhost/musichub/songs/";

$postFrom = "DT";
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
</div></div>";
?>

<div class='cmtListFrame'>
<?php
$sqlcmt = "SELECT * FROM cmt_file WHERE post_id = '$postId' ";
$cmtList = mysqli_query($conn,$sqlcmt);

//cmt list show - post , up , down,reply -data still wrong
while($res = mysqli_fetch_array($cmtList )) 
					{
$cmtId = $res['cmt_id'];
						$userId = $res['user_id'];
						$cmtupCo = $res['cmt_up_co'];
						$cmtdownCo = $res['cmt_down_co'];
						$cmtReplyCo = $res['reply_co'];
						
		 $sqlOtherUsr = "SELECT user_fname,user_lname FROM user_info_file WHERE user_id='$userId'";
		 		 $otherName  = mysqli_query($conn,$sqlOtherUsr);

		while($resNa = mysqli_fetch_array($otherName)) 
					{
					$Name = $resNa['user_fname'].$resNa['user_lname'];
					} 
						echo"<div class='wT'>
<div class='wpro'><div class='wproU'><img src='http://localhost/musichub/images/me.jpg' class='image'  alt='cute'></div><div class='wproD'>
".$Name ."</div></div><div class='wproBk'><div class='bkUp'><div class='wtxt'>".$res['cmt_txt']."</div><div class='wmore'><button class='btn-link'><b>:</b></button></div></div>
								<div class='bkDown'><div class='wup'>
								<a href='cmtup.php?cmt_id=".$cmtId."&postFrom=".$postFrom."' class='up'>".$cmtupCo .".Up</a>&nbsp;
</div><div class='wdown'>
<a href='cmtdown.php?cmt_id=". $cmtId ."&postFrom=".$postFrom."' class='down'>".$cmtdownCo .".Down</a></div>
<div class='wrply'>
<a href='cmtreply.php?cmt_id=".$cmtId."&postFrom=".$postFrom."' class='down'>".$cmtReplyCo.".Reply</a></div></div></div>
</div>
"; 

				}
//end of cmt creator
?>
</div>
<div  class="cmtPost">
<form action="uploadCmt.php" method="POST" >
<input type="text" class="addPost" name="cmtTxt">
<input type="text" name="postId" value="<?php echo $postId; ?>" style="display:none" >
<input type="submit" value="Post" name="post" class="btn-info" >
</div>
<?php
//end of if true  check
	}else {
			header("Location:newsfeed.php");
	}				

?>




</body>
</html>