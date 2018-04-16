<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}
?>
<html>
<head>

<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>
<link  rel="stylesheet" type="text/css" href="http://localhost/musichub/css/style.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css"></style>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">

.tagBar{
font-family: TimeNewRome;
background-color: skyblue;
box-shadow: 2px 2px 5px black ;
align-self: center;
color: white;
font-size: 20px;
height: 45px;
}
.textNews{
font-family: TimeNewRome;
font-size: 18px;
margin: 5px;
}

.addPostFrame
{
background-color: white;
width: 100%;
height: 20%;

padding: 5px;
margin-top: 0px;
box-shadow: 2px 2px 3px  2px gray ;
}
.addPost
{
background-color: #f2f2f2;
width: 80%;
height: 60%;
color: black;
}
.showPostFrame
{
margin-top: 10px;
width: 100%;
height: 100%;

}
.image
{
 width: 30px;
 height: 30px;
 float: left;

}
.showPost
{
	background-color: white;
padding: 5px;
box-shadow: 2px 2px 2px  2px gray ;
}
.PostUp
{
 width: match;
 height: 45px;
 
}
.postDate
{
	
 font-size: 10px;
color: gray;
margin: 5px;

}
.PostLow
{

}

.host
{
	margin-top: 5px;
background-color: whitesmoke;
padding-top: 0px;
padding: 10px;
font-family: TimeNewRome;
}

.wrap-postAct
{
font-size: 13px;
}
@media(max-width: 600px)
{
.textNews{
 display: none;
}
}
</style>


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
<form action="" method="post">
<input type="file" name="image"/>
<br>
<input type="text" class="addPost">
<input type="submit" value="Post" name="post">
</div>

<div class="showPostFrame">
<div class="showPost">
<div class="PostUp"><img src="http://localhost/musichub/images/me.jpg" class="image" alt="cute">Min Maung Maung &nbsp; <a href="http://localhost/musichub/follow.php">Follow</a>&nbsp;&nbsp;<button>more</button>
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