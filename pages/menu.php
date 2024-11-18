<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
     $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc=mysqli_query($connect,$sql_danhmuc);   
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
	<div class="header">
        <div class="header-top">
            <div class="header-top-content">
                <div class="login">
					<?php
                if(isset($_SESSION['dangky'])){
                ?>                 
					<a href="index.php?quanly=thongtin" class="header-text">THÔNG TIN </a> 
					<a href="#" class="header-text"> / </a>
                    <a href="index.php?dangxuat=1" class="header-text"> ĐĂNG XUẤT</a>
                <?php
                    }else{
                ?>                  
					<a href="index.php?quanly=dangnhap" class="header-text">ĐĂNG NHẬP </a> 
					<a href="index.php?quanly=dangnhap" class="header-text"> / </a>
                    <a href="index.php?quanly=dangky" class="header-text"> ĐĂNG KÝ</a>
                <?php
                    }
            ?>
					
                </div>
                <div class="logo">
                    <img src="img/logo-mona.png" class="logo-img">
                </div>
                <div class="cart">
                       <a href="index.php?quanly=giohang" class="header-text">GIỎ HÀNG</a>
                      <a href="index.php?quanly=giohang" class="header-text"><img width="45px" src="img/cartN.png" class="cart-img"></a>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="menu">
                <ul  class="menu">
                    <li <?php
						$url= $_SERVER['REQUEST_URI'];
						if ($url=='/BanGiayWeb/index.php') { echo "class='active'"; } ?> >
						<a href="index.php">TRANG CHỦ</a></li>
                    <li  <?php
						$url= $_SERVER['REQUEST_URI'];
						if ($url=='/BanGiayWeb/index.php?quanly=allsanpham') { echo "class='active'"; } ?> >
						<a href="index.php?quanly=allsanpham">SẢN PHẨM</a>
						
						<ul class="menu_danhmuc">
                        <?php
                                while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){

                                ?>
                                <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>

                                <?php
                                    }
                                ?>
                        </ul>
						
					</li>
                    <li  <?php
						$url= $_SERVER['REQUEST_URI'];
						if ($url=='/BanGiayWeb/index.php?quanly=tongtintuc') { echo "class='active'"; } ?>>
						<a href="index.php?quanly=tongtintuc">TIN TỨC</a></li>
                    <li  <?php
						$url= $_SERVER['REQUEST_URI'];
						if ($url=='/BanGiayWeb/index.php?quanly=gioithieu') { echo "class='active'"; } ?>>
						<a href="index.php?quanly=gioithieu">GIỚI THIỆU</a></li>
                    <li <?php
						$url= $_SERVER['REQUEST_URI'];
						if ($url=='/BanGiayWeb/index.php?quanly=contact') { echo "class='active'"; } ?>>
						<a href="index.php?quanly=contact">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div>
	</div>
</body>
</html>