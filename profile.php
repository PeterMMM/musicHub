<?php
session_start();
if(!isset($_SESSION['status'])) {
	header("Location:index.php");
}

if(isset($_POST['logout']))
{
	//session destory
	session_unset();
	session_destroy();
header("Location: index.php");
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

@media(max-width: 600px)
{
.textNews{
 display: none;
}
}
body
{
background-color: whitesmoke;
}

</style>
</head>
<body>

<div  class="tagBar"> <b class="textNews"> Music Hub </b>
<a href="newsfeed.php"><button type="button"  class="btnTag" >Newsfeed</button></a>
<a href="toprate.php"><button type="button"  class="btnTag" >TopBoard</button></a>
<a href=""><button type="button" class="btnTag">Noti</button></a>
<button type="button" class="btnTag" >Profile</button>
</div>
<div class="frame">


<div class="logoutRow"><form action="" method="post"> <input type="submit" value="Logout" name="logout" class="btn btn-link" style="background-color:skyblue;color:white;margin:5px;font-size:12px;"> </form></div>
</div>
</body>
</html>

