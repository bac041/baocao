<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.logout a{
			text-decoration: none;
			color: black;
			font-size: 18px;
			font-weight: bold;
		}
		.logout a:hover{
			color: #FF3300;
		}
	</style>
</head>
<body>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<p class="logout">
	<a href="index.php?dangxuat=1">Đăng xuất : 
		<?php if(isset($_SESSION['dangnhap'])){
			echo $_SESSION['dangnhap'];

		} ?>
	</a>
</p>
</body>
</html>