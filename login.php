<!DOCTYPE html>
<html>
<head>
<title>ShareBear || Login</title>
</head>
<body>
<?php
$user = $_POST['username'];
$password = $_POST['password'];
include "connect.php";
$sql = mysqli_query($con,"Select * from Bear where user='$user'");
$num = mysqli_num_rows($sql);
if ($num < 1)
{
    echo "Username not found.";
	include "index.php";
}
    else
{
    while($row=mysqli_fetch_array($sql))
	{
		$user=$row['buser'];
		$pass=$row['password'];
	}
	if($password==$pass)
	{
		session_start();
		$_SESSION['bear']=$user;
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
	else
	{
		echo "Incorrect password";
		include "index.php";
	}
}
?>
</body>
</html>