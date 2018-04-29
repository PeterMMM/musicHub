<?php
session_start();
if(isset($_SESSION['status'])) {
	header("Location:newsfeed.php");
}
?>
<html>
<head>
<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>
<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css">
<link  rel="stylesheet" href="http://localhost/musichub/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">

if (screen.width <= 699) {
window.location = "mobile.index.php";
}

</script>


</head>
<body>
<?php
	include 'connect.php';
	$userEmail = $password = $emailErr = $pwErr = "";

//get data from form
if(isset($_POST['login'])) {
$userEmail = $_POST["email"] ;
$password = $_POST["password"];



//get username and email from db
$sql = "SELECT * FROM user_info_file WHERE user_email = '$userEmail' OR user_pw = '$password' " ;
$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
        if($userEmail == $row["user_email"] &&  $password == $row["user_pw"] )
        {
        	
        	//session start
        	session_start();
        	$_SESSION["status"]="login";
        	$_SESSION["userLname"] =  $row["user_lname"] ;
        	$_SESSION["userFname"] = $row["user_fname"];
        	$_SESSION["userId"] = $row["user_id"];
        	
          header("Location: newsfeed.php");
        }elseif($userEmail == $row["user_email"] &&  $password != $row["user_pw"])
        {
        	 $pwErr= "Your password is wrong! ";
       }elseif($userEmail != $row["user_email"] &&  $password == $row["user_pw"])
       {
       	$emailErr= "Your email is wrong";
       }
     }
	
$conn->close();
}
?>
<div  class="blueBar">Welcome to <b> Music Hub </b> !</div>
<div   class="loginCa" >

<div class="form-group" ">
	<h3 class="loginTitle">Login User account</h3>
	
<form action="" method="POST" role="form">
	<table>
	<tr   class="text"><td class="showTxt">E mail : </td><td><input class="form-control" type="email" name="email" placeholder="e mail"/> </td><td ><?php echo "<h6 style='font-family: TimeNewRome;color:red; padding:1.5px;'>".$emailErr."</h6>"; ?></td></tr>
	<tr class="text"><td  class="showTxt">Password : </td><td><input class="form-control" type="password" name="password" placeholder="password"</td><td><?php echo "<h6 style='font-family: TimeNewRome;color:red; padding:1.5px;'>".$pwErr."</h6>"; ?></td></tr>

	
	<tr><td colspan="3" style="padding:10px; padding-left:40%;"> <input class="btn btn-default btn-md" type="submit" value="Login" name="login"/> </td></tr>
	</table>
	</form>
<a style="float:left;" class="text" href="signup.php">Sign up</a>
</div>
</div></div>





<!-- while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["user_fname"]. " " . $row["user_lname"]. ", user email - ".$row["user_email"]."  user pw - ".$row["user_pw"]."<br>";
     }
 -->
 
 
 </body>
</html>

