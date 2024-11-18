<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CT sản phẩm </title>
</head>

<body>
	<?php
    $sql_chitiet ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet=mysqli_query($connect,$sql_chitiet);
    while ($row_chitiet=mysqli_fetch_array($query_chitiet) ){
	
 ?>
	<form class="form-sp" action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
	<?php if ($row_chitiet['trangthai']=='0') {?>
    <div class="gap"></div>
    <div class="container">
        <div class="container-mains">
            <div class="top">
                <div class="top-left">
                    <div class="content">
                        <img id="img"  src="img/<?php echo $row_chitiet['hinhanh']?>" >
                        
                    </div>
                </div>
                <div class="top-right">
                    <div class="content-title">
                        <a class="text" href="index.php">TRANG CHỦ</a> 
                        <p>&nbsp;/&nbsp;</p>
                        <a class="text" href="index.php?quanly=allsanpham">SẢN PHẨM</a>
                    </div>
                    <h2><?php echo $row_chitiet['tensanpham']?></h2>
                    <div class="divder"></div>
					<span class="price-default"><?php echo number_format($row_chitiet['giasanpham'],0,',','.').' VNĐ' ?></span>
                    <h1 class="product-price" style="color: #c30005"> <?php  
	                    $gia = $row_chitiet['giasanpham'];
                        $giam_gia = (float) $row_chitiet['noidung']/100 ;
                         $gia_sau_khi_giam = $gia - ($gia * $giam_gia);
				     echo number_format($gia_sau_khi_giam,0,',','.').' VNĐ'
                         ?></h1> 
                       <div class="sluong">
						   
               <p class="soluong-sp-cosan"><?php echo $row_chitiet['soluong'] ?> </p><span class="soluong-sp-cosan-text"> Sản phẩm còn sẵn</span>
								</div>
                        <div class="item"> 
							
                             <div class="soluong-sp">
              
               
								 
								 <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-minus">&#60;</i></a>
								 <input class="soluong-sp-input" type="text" name="soluong" value="1">
								 <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-plus">&#62;</i></a>
								
								 <input style="color: white" class="themgiohang" type="submit" name="themgiohang" value="Mua">
                         </div>
                            
                        </div>
                    <div class="content-bottom">
                        <div class="item-bottom">
                            <div style="height:20px ;width: 100%;">
                                <p class="item-bottom-text" > <b>Tính phí ship tự động</b></p>
                            </div>
                            <div class="box" style="margin-top:20px">
                                <img class="item-bottom-img" src="img/logo-ghn.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-ghtk.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-ninja-van.jpg" alt="logo">
                            </div>
                            <div class="box">
                                <img class="item-bottom-img" src="img/logo-shipchung.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-viettle-post.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-vn-post.jpg" alt="logo">
                            </div>
                        </div>
                        <div class="item-bottom">
                            <div style="height:20px ;width: 100%;">
                                <p class="item-bottom-text" > <b>Thanh toán</b></p>
                            </div>
                            <div class="box" style="margin-top:20px">
                                <img class="item-bottom-img" src="img/logo-acb.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-techcombank.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-vib.jpg" alt="logo">
                            </div>
                            <div class="box">
                                <img class="item-bottom-img" src="img/logo-vcb.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-paypal.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-mastercard.jpg" alt="logo">
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-text">
                        Mã sản phẩm: <?php echo $row_chitiet['masanpham']?>
                    </div>
                    <div class="product-text">
                        Danh mục: <?php echo $row_chitiet['tendanhmuc']?>
                    </div>
                </div>  
            </div>
			
            <div class="mid">
                <div class="mid-main">
                    <div class="mid-top">
                        <div class="top-item">
                            <a class="top-item-text" style="color: black;" href="">MÔ TẢ</a>
                        </div>
                        <div class="top-item1">
                            <a class="top-item-text text" href="">ĐÁNH GIÁ (0)</a>
                        </div>
                    </div>
                    <div class="mid-bottom">
                        <div style="height: 200px;width: 1190px;margin: auto;padding: 40px 20px 20px; text-align: justify">
                            <p class="text1">
                              <?php echo $row_chitiet['tomtat']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			<?php
    }
 ?>

<?php if ($row_chitiet['trangthai']!='0') {?>
			
    <div class="gap"></div>
    <div class="container">
        <div class="container-mains">
            <div class="top">
                <div class="top-left">
                    <div class="content">
                        <img id="img"  src="img/<?php echo $row_chitiet['hinhanh']?>" >
                        
                    </div>
                </div>
                <div class="top-right">
                    <div class="content-title">
                        <a class="text" href="index.php">TRANG CHỦ</a> 
                        <p>&nbsp;/&nbsp;</p>
                        <a class="text" href="index.php?quanly=allsanpham">SẢN PHẨM</a>
                    </div>
                    <h2><?php echo $row_chitiet['tensanpham']?></h2>
                    <div class="divder"></div>
                    <h1 class="product-price"><?php echo number_format($row_chitiet['giasanpham'],0,',','.') ?> VNĐ</h1> 
					<div class="sluong">
               <p class="soluong-sp-cosan"><?php echo $row_chitiet['soluong'] ?> </p><span class="soluong-sp-cosan-text"> Sản phẩm còn sẵn</span>
								</div>
                        <div class="item"> 
							
                             <div class="soluong-sp">
              
               
								 
								 <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-minus">&#60;</i></a>
								 <input class="soluong-sp-input" type="text" name="soluong" value="1">
								 <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-plus">&#62;</i></a>
								
								 <input class="themgiohang" type="submit" name="themgiohang" value="Mua">
                         </div>
                            
                        </div>
                    <div class="content-bottom">
                        <div class="item-bottom">
                            <div style="height:20px ;width: 100%;">
                                <p class="item-bottom-text" > <b>Tính phí ship tự động</b></p>
                            </div>
                            <div class="box" style="margin-top:20px">
                                <img class="item-bottom-img" src="img/logo-ghn.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-ghtk.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-ninja-van.jpg" alt="logo">
                            </div>
                            <div class="box">
                                <img class="item-bottom-img" src="img/logo-shipchung.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-viettle-post.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-vn-post.jpg" alt="logo">
                            </div>
                        </div>
                        <div class="item-bottom">
                            <div style="height:20px ;width: 100%;">
                                <p class="item-bottom-text" > </p>
                            </div>
                            <div class="box" style="margin-top:20px">
                                <img class="item-bottom-img" src="img/logo-acb.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-techcombank.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-vib.jpg" alt="logo">
                            </div>
                            <div class="box">
                                <img class="item-bottom-img" src="img/logo-vcb.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-paypal.jpg" alt="logo">
                                <img class="item-bottom-img" src="img/logo-mastercard.jpg" alt="logo">
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-text">
                        Mã sản phẩm: <?php echo $row_chitiet['masanpham']?>
                    </div>
                    <div class="product-text">
                        Danh mục: <?php echo $row_chitiet['tendanhmuc']?>
                    </div>
                </div>  
            </div>
			
            <div class="mid">
                <div class="mid-main">
                    <div class="mid-top">
                        <div class="top-item">
                            <a class="top-item-text" style="color: black;" href="">MÔ TẢ</a>
                        </div>
                        <div class="top-item1">
                            <a class="top-item-text text" href="">ĐÁNH GIÁ (0)</a>
                        </div>
                    </div>
                    <div class="mid-bottom">
                        <div style="height: 200px;width: 1190px;margin: auto;padding: 40px 20px 20px; text-align: justify">
                            <p class="text1">
                              <?php echo $row_chitiet['tomtat']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			<?php
    }
 ?>			
		</form>	
			<?php
    }
 ?>
			<?php				
			
    $sql_tuongtu = "SELECT * FROM tbl_sanpham
                INNER JOIN tbl_danhmuc 
                ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
                WHERE tbl_sanpham.id_danhmuc = (SELECT id_danhmuc FROM tbl_sanpham WHERE id_sanpham = '$_GET[id]')
                AND tbl_sanpham.id_sanpham <> '$_GET[id]'";
			/*tbl_sanpham.id_sanpham <> '$_GET[id]' được sử dụng để loại bỏ sản phẩm đang xem ra khỏi kết quả truy vấn*/
    $query_tuongtu=mysqli_query($connect,$sql_tuongtu);
    ?>
            <div class="bottom1">
                <div class="bottom-top">
                    <h4>SẢN PHẨM TƯƠNG TỰ</h4>
                </div>
				
                <div class="row-products" >
					<?php
				while ($row_tuongtu=mysqli_fetch_array($query_tuongtu)){
 ?>
                    <div class="card-product card-product-small">
                        <div class="card-img">
                            <img src="img/<?php echo $row_tuongtu['hinhanh']?>" >
                        </div>
                        <div class="card-bot">
                            <p class="card-title"><?php echo $row_tuongtu['tensanpham']?></p>
                            <div class="card-price">
                                <span><?php echo number_format($row_tuongtu['giasanpham'],0,',','.') ?> VNĐ</span>
                            </div>
                            <a href="index.php?quanly=ctsanpham&id=<?php echo $row_tuongtu['id_sanpham'] ?>" class="box-btn btn-card">Xem Sản Phẩm</a>
                        </div>
                    </div>
                  <?php
    }
 ?>
                  
                   
                </div>
				
            </div>
        </div>
    </div>
	<script type="text/javascript">
      var soluong = document.querySelector('.soluong-sp-input');
      var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
      var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
      var soluongMax = document.querySelector('.soluong-sp-cosan').innerHTML;
      console.log(soluongMax);
      
      demPlus.addEventListener('click',function(){
         // console.log("hi");
         // soluong.value++;
		  
         if(parseInt(soluong.value) <(soluongMax)) {
         soluong.value++;
           } else {
            alert("Số lượng sản phẩm còn lại chỉ còn: "+soluongMax);
       }
      })
		
      demMins.addEventListener('click', function(){
          if(soluong.value<=1){
            alert('Số lượng sản phẩm phải lớn hơn bằng 1');
            soluong.value=1;
          } else {
            soluong.value--;
          }
      })

 </script>
 
</body>
</html>
