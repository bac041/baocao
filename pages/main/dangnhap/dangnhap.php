<?php
    session_start();
	include('../admincp/config/connect.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='".$taikhoan."' AND tbl_dangky.matkhau='".$matkhau."'  LIMIT 1";
		$row = mysqli_query($connect,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['taikhoan'];
			$_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang']= $row_data['id_khachhang'];
			header("Location:../index.php");
		}elseif($taikhoan=='admin'){
            header("Location:../admincp/login.php");
        }else{
			$message = "Tài khoản mật khẩu không đúng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
	} 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link rel="stylesheet" href="Dangnhap.css" type="text/css">
</head>
<body>

	<div class="container">
		
		<div class="main">
			<div class="avatar">
				<img src="../../../img/avatar.png" height="80px" alt="">
			</div>
			<div class="top">
				<h1>ĐĂNG NHẬP</h1>
			</div>
			<div class="bot">
				<div class="login">
				<form action="" method="POST">
						<input type="text" placeholder="Enter username" name="taikhoan" >
						<input type="password" placeholder="Enter password" name="password">
						<div class="remember">
							<input type="checkbox" checked="checked"><label>Remember me</label>
							<div class="fogot"><h6><a href="#">Forgot Password?</a></h6></div>
						</div>
						<button><a name="dangnhap">Đăng nhập</a></button>
					</form>
					<div class="sign-up">
						<h2>or</h2>
					</div>
			  </div>
				<div class="social">
					<div class="fb ">
						<a  href="#"><img src="../../../icon/fb.PNG" height="25px" alt="">Facebook</a>
					</div>
					<div class="fb tw">
						<a  href="#"><img src="../../../icon/twitter.PNG" height="25px" alt="">Twitter</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>
