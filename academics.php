<?php
session_start();
if (!isset($_SESSION['bear']))
{
?>
	<script>
	window.location.href='index.php';
	</script>
<?php
}
include "connect.php";
$bear = $_SESSION['bear'];
$search = mysqli_query($con, "Select * from bear where buser='$bear'");
$num = mysqli_num_rows($search);
if ($num < 1)
{
	session_destroy();
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
else
{
	While ($row = mysqli_fetch_array($search))
	{
			$fname = $row['fname'];
			$gname = $row['gname'];
			
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Home || <?php echo $gname . " " . $fname; ?> </title>
<link rel='icon' href='bear.png' type='image/icon type'/>
<link rel='stylesheet' href='style.css' type='text/css'/>
<script src="https://kit.fontawesome.com/f8a0d66908.js
" crossorigin="anonymous"></script>
</head>
<body>
<div class='header'>
	<div class='header_right'>
		<?php
			$pfp = mysqli_query($con, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
			echo "<p>" .$gname . " " . $fname . "</p>";
		?>
	</div>
	<div class='header_left'>
		<form action='bsearch.php' method='post'>
			<input type='text' name='search' placeholder='Search'/>
		</form>
		<a href='home.php' title='Home' > <i class="fa-solid fa-house"></i> </a>
		<a href='settings.php' title='Settings' > <i class="fa-solid fa-gear"></i> </a>
		<a href='logout.php' title='Logout' > <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
	</div>
</div>
<div class='categories'>
	<p> Categories </p>
	<a href='General.php' title='General' > General </a> <br>
	<a href='Food.php' title='Food' > Food </a><br>
	<a href='Academics.php' title='Academics' > Academics </a><br>
	<a href='News.php' title='News' > News </a><br>
	<a href='Fashion.php' title='Fashion' > Fashion </a> <br>
	<a href='Entertainment.php' title='Entertainment' > Entertainment </a><br>
	<a href='Sports.php' title='Sports' > Sports </a><br>
	<a href='Events.php' title='Events' > Events </a><br>
</div>
<div class='FrontPage'>
	<p class='feed'> Academics </p>
</div>
<div class='post'>
	<div class='pfp'>
	<form action='post.php' method='post'>
			<textarea id='bearpost' name='bearpost' rows='1' cols='50' placeholder='Something on your Mind? Type it here!'></textarea>
			<input type='file' name='file' Placeholder='Upload a Picture'>
			<input type='submit' value='Post'>
		</form>
		<?php
			$pfp = mysqli_query($con, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
		?>
		
</div>
</body>
</html>