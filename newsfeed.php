<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}
?>
<html>
<head>
<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>

<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css"></style>
<link  rel="stylesheet" href="http://localhost/musichub/css/style.css"></style>
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


</style>
</head>
<body>

<div  class="tagBar"> <b class="textNews"> Music Hub </b>
<button type="button"  class="btnTag" >Newsfeed</button>
<button type="button" class="btnTag">Noti</button>
<a href="profile.php"><button type="button" class="btnTag" >Profile</button></a>

</div>

<br>


</body>
</html>