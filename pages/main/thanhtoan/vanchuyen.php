	<style>
	ul {
  list-style: none;
  padding: 0;
}
li {
  margin-bottom: 10px;
}
h4 {
  margin-top: 30px;
  font-weight: normal;
}
table {
  margin-top: 30px;
}
tr th {
  padding: 10px;
  background-color: #b02e38;
  color: #fff;
  font-weight: normal;
}
tr td {
  padding: 10px;
  border: 1px solid #ccc;
background-color: white;
}
tr td img {
  max-width: 100%;
}
.btn-success {
  background-color: #dc3545;
  color: #fff;
  border: none;
  padding: 8px 20px;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  margin-right: 10px;
}
.btn-success:hover {
  background-color: #b02e38;
}

		
		.info-block {
		
  

  background-color: #111111;
  color: #000000;
  text-align: center;
  padding: 20px;
  border-radius: 10px;
}

.title {
	
  font-size: 24px;
  margin-bottom: 20px;
}

.info-list {
	
  list-style: none;
  margin: 0;
  padding: 0;
}

.info-list li {
  font-size: 20px;
  margin-bottom: 10px;
}

.contact-note {
  font-size: 16px;
  margin-top: 20px;
}
		.vcinfo{
			 background: url("../../../img/banner-1.jpg") no-repeat center center fixed;
  background-position: center;
  background-size: cover;
			color: #ECECEC;
			
		}

</style>
<p></p>
<div class="container">
        <div class="arrow-steps clearfix">
            <div class="step "> <span> <a href="../../../index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Kiểm tra </a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
            
        </div>

<h4></h4>


<?php
 	$id_dangky = $_SESSION['id_khachhang'];
 	$sql_get_vanchuyen = mysqli_query($connect,"SELECT * FROM tbl_dangky WHERE id_khachhang='$id_dangky' LIMIT 1");
	
 	
 	if($id_dangky!=''){
 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
 		$name = $row_get_vanchuyen['hovaten'];
 		$phone = $row_get_vanchuyen['sodienthoai'];
 		$address = $row_get_vanchuyen['diachi'];
 		$note = $row_get_vanchuyen['email'];
 	}else{
		 
 		$name = '';
 		$phone = '';
 		$address = '';
 		$note = '';
 	}
 	?>
 		
<div class="col-md-8">
  		
  		<div class="info-block">
			<div class="vcinfo">
  <h2 class="title">Thông tin vận chuyển</h2>
  <ul class="info-list">
    <li>Họ và tên: <b><?php echo $name ?></b></li>
    <li>Số điện thoại: <b><?php echo $phone ?></b></li>
    <li>Địa chỉ: <b><?php echo $address ?></b></li>
    <li>Email: <b><?php echo $note ?></b></li>
  </ul>
  <div class="contact-note">Nếu bạn muốn đổi địa chỉ tài khoản hãy sửa ở phần thông tin nhé</p>
</div>

</div>
	<!--GIO HANG---->
    <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
        <tr>
            <th>ID</th>
            <th>Mã </th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Số lượng</th>
            <th>Giá </th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
    <?php
        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                $tongtien+=$thanhtien;
                $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $cart_item['masp']?></td>
            <td><?php echo $cart_item['tensanpham'] ?></td>
            <td><img src="../../../img/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>
            <td>
                <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                <?php echo $cart_item['soluong'] ?>
                <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
            </td>
            <td><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
            <td><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
            <td><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-success">XÓA</a></td>
        </tr>

    <?php 
            }
    ?>

        <tr>
            <td colspan="8">
                <p style="float: left;"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                <p style="float: right;"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-success">Xóa Hêt</a></p>
                <div style="clear: both;"> </div>

                    <?php
                            if(isset($_SESSION['dangky'])){
                                
                    ?>
                            <p><a href="index.php?quanly=thongtinthanhtoan" class="btn btn-success">Thanh toán</a></p>
                    <?php
                    }else{
                    
                    ?>
                         <p><a href="index.php?quanly=dangky">Đăng kí đặt hàng</a></p>
                    <?php
                     }
                    ?>     
            </td>
        </tr>
    <?php   
        }else{ 
    ?>
        <tr>
            <td colspan="6">Hiện tại giỏ hàng trông</td>
        </tr>
    <?php
        }
    ?>
    </table>
</div>
</div>
