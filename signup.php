<html>
<head>
<script src="http://localhost/musichub/javascript/jquery-1.8.0.min.js"></script>
<link  rel="stylesheet" href="http://localhost/musichub/css/bootstrap.min.css"></style>
<link  rel="stylesheet" href="http://localhost/musichub/css/style.css"></style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">

table, td{
padding:1.5px;
}

.text{
margin: 10px;
font-family: TimeNewRome;
font-size: 16px;
}

.loginCa
{
	width: 550px;
	height: 550px;
	margin: 50px;
	padding: 25px;
	 box-shadow: 0 4px 8px 0 black;
    text-align: center;
}

@media only screen and (max-width: 500px)
{
	
.text{
	padding: 0px;
margin: 10px;
font-family: TimeNewRome;
font-size: 16px;

}


.loginCa
{
	width: 95%;
	height: 450px;
	margin: 3%;
	padding: 10px;
	 box-shadow: 0 4px 8px 0 black;
    text-align: center;
}

.showTxt{
width: 35%;

}
	}
</style>
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
$sql = "SELECT user_lname, user_email, user_pw FROM user_info_file WHERE user_email = '$userEmail' OR user_pw = '$password' " ;
$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
        if($userEmail == $row["user_email"] &&  $password == $row["user_pw"] )
        {
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
	<h3 class="loginTitle">Sign Up User account</h3>
	
<form action="" method="POST" role="form">
	<table><tr class="text"><td class="showTxt">Name : </td><td><input class="form-control"  type="text" name="fname" placeholder="first name" required/></td></tr>
	<tr class="text"><td class="showTxt"> </td><td>	<input class="form-control" type="text" name="lname" placeholder="last name" required/></td></tr>			
		<tr class="text"><td class="showTxt">Email : </td><td><input class="form-control" type="email" name="email" placeholder="email"/></td></tr>
	<tr class="text"><td class="showTxt">Password : </td><td><input class="form-control"  type="password" name="password" placeholder="password"/></td></tr>
	<tr class="text"><td class="showTxt">Re-password : </td><td><input class="form-control"  type="password" name="re-password" placeholder="re-password"/></td></tr>
	<tr class="text"><td class="showTxt">Gender : </td><td>Male   <input  type="radio" name="gender"  value="male"/> Female  <input  type="radio" name="gender"  value="female"/>Other  <input  type="radio" name="gender"  value="other"/></td></tr>
	<tr class="text"><td class="showTxt">Date Of Birth : </td><td><input class="form-control" type="date" name="dob" placeholder="DOB"/></td></tr>
		<tr class="text"><td class="showTxt">Country : </td><td><select class="form-control"  name="country">
  <option value="myan">Myanmar</option>
  <option value="us">US</option>
  <option value="eng">England</option>
  <option value="china">China</option>
  <option value="kor">Korea</option>
  <option value="rus">Russia</option>
</select></td></tr>	
<tr><td colspan="3" style="padding:10px; padding-left:40%;"> <input class="btn btn-default btn-md" type="submit" value="Signup" name="signup"/> </td></tr>
	</table>
	</form>
<a style="float:left;" class="text" href="index.php">Login</a>
</div>
</div></div>

 </body>
</html>

