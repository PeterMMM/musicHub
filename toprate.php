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
body
{
background-color: whitesmoke;
}
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
.host
{
padding: 0px;
font-family: TimeNewRome;
overflow: auto;
	background-color: pink;
	width: 50em;
	height: 46.5em;
	max-height: 46.5em;
	
	padding: 25px;
	    margin: 1%;
	 box-shadow: 0 4px 8px 0 black;
    text-align: center;

}



@media(max-width: 600px)
{
	.host
	{
		    margin: 3%;
width: 24em;
	height: 40.5em;
	max-height: 40.5em;	
	}
.textNews{
 display: none;
}
}
</style>

</head>
<body>

<div  class="tagBar"> <b class="textNews"> Music Hub </b>
<a href="newsfeed.php"><button type="button"  class="btnTag" >Newsfeed</button></a>
<button type="button"  class="btnTag" >TopBoard</button>
<a><button type="button" class="btnTag">Noti</button></a>
<a href="profile.php"><button type="button" class="btnTag" >Profile</button></a>

</div>


<div class="host">
<div   class="rateCa"   >
This is rate list.
1.Music 1<br>
1.Music 1<br>

1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
1.Music 1<br>
2.Music 1<br>
</div>
</div>
</body>
</html>