<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

//connect db
include('connect.php');
?>
<html>
<head>
<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>
<link  rel="stylesheet" type="text/css" href="http://localhost/musichub/css/mobile.style.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css"></style>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">

if (screen.width > 699) {
window.location = "index.php";
}

</script>


</head>
<body>

<div  class="tagBar"> <b class="textNews"> Music Hub </b>
<button type="button"  class="btnTag" >Newsfeed</button>
<a href="toprate.php"><button type="button"  class="btnTag" >TopBoard</button></a>
<a><button type="button" class="btnTag">Noti</button></a>
<a href="profile.php"><button type="button" class="btnTag" >Profile</button></a>
</div>

<div class="host">
<div class="addPostFrame" class="well">
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="song"/>
<br>
<input type="text" class="addPost" name="postTxt">
<input type="submit" value="Post" name="post">
</div>

<div class="showPostFrame">
<div class="showPost">
<div class="PostUp">
<img src="http://localhost/musichub/images/me.jpg" class="image" alt="cute">Min Maung Maung &nbsp; <a href="http://localhost/musichub/follow.php">Follow</a>&nbsp;&nbsp;<button>more</button>
<br><div class="postDate">9 Apr 2018</div>
</div>
<div class="PostLow">
<p> This is show htoo song. This song is cool.</p>
<p><b>Artist : Shwe Htoo <br>Song  Name: Love u</b></p>
<audio controls>
	<source src="http://localhost/musichub/songs/shwe.mp3" type="audio/mpeg">	
	Your browser does not support the audio tag.
</audio>
<div class="wrap-postAct">
<div class="postInfo">&nbsp;3 Share &nbsp; 5 Comments &nbsp; 100 Up &nbsp; 3 Down</div>
<div class="postAct">&nbsp;<a href="http://localhost/musichub/sharePost.php">Share</a>&nbsp;
<a href="http://localhost/musichub/postDetail.php">Comment</a>&nbsp;
<a href="http://localhost/musichub/up.php">Up</a>&nbsp;
<a href="http://localhost/musichub/down.php">Down</a>
</div></div>
</div>
</div>


</div>
</div>
</body>
</html>