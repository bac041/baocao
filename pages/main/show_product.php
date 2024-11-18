<?php
     $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc=mysqli_query($connect,$sql_danhmuc);   
?>
<div class="gap"></div>


	<div class="container">
		 <div class="content-row">
       <div class="row-title">
		   <h3>DANH MỤC SẢN PHẨM</h3>  </div>
        <div class="content-top">
			<?php
                                while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){

                                ?>
            <div class="col-sneaker">
                <div class="box-sneaker">
                    <div  >
						<p class="img-title" ><?php echo $row_danhmuc['tendanhmuc']?></p>
                        
                    </div>
					
                    <img src="img/<?php echo $row_danhmuc['hinhanhdm']?>" class="img-sneaker">
					
                    <div class="box-button">
                        <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>" class="box-btn">Xem danh mục</a>
                    </div>
                </div>
            </div>
			<?php
                                    }
                                ?>
         
          
        </div>
		 </div>
		
				<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show_new ="SELECT * FROM tbl_sanpham WHERE trangthai=1 ORDER BY id_sanpham DESC LIMIT 4";
    $query_show_new =mysqli_query($connect,$sql_show_new);
?>
	
        <div class="gap"></div>
        <div class="content-row">
            <div class="row-title">
                <h3>SẢN PHẨM MỚI</h3>
            </div>
					
            <div class="row-product">
				<?php
        while ($row=mysqli_fetch_array($query_show_new)){
    ?>
                <div class="card-product" >
					 <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>">
                    <div class="card-img">
                        <img src="img/<?php echo $row['hinhanh'] ?>" >
                    </div>
                    <div class="card-bot">
                        <p class="card-title"><?php echo $row['tensanpham'] ?></p>
                        <div class="card-price">
                            <span><?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></span>
                        </div>
                        <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>" class="box-btn card-btn">Xem sản phẩm</a>
                    </div>
					</a>
                </div>
                 <?php
        }
    ?>
            </div>
        </div>
		
		<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show_sale ="SELECT * FROM tbl_sanpham WHERE trangthai=0 ORDER BY id_sanpham DESC ";
    $query_show_sale =mysqli_query($connect,$sql_show_sale);
?>
		
        <div class="gap"></div>
        <div class="content-banner">
            <div class="banner-text">
                <h5>RAIDEN SNEAKER</h5>
                <h1>KHUYẾN MÃI <span>GIẢM GIÁ 50%</span></h1>
                <a href="#section1" class="box-btn">Xem sản phẩm</a>   
            </div>
        </div>
		
        <div class="gap"></div>
        <div class="content-row">
            <div class="row-title" id="section1">
                <h3>SẢN PHẨM GIẢM GIÁ</h3>
            </div>
			
            <div class="row-product" >
				<?php
        while ($row=mysqli_fetch_array($query_show_sale)){
	$gia = $row['giasanpham'];
    $giam_gia = (float) $row['noidung']/100 ;

    $gia_sau_khi_giam = $gia - ($gia * $giam_gia);
    ?>
				 <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>">
                <div class="card-product">
                    <div class="card-img img-sale">
                        <div class="sale"><span> <?php echo $row['noidung'] ?></span></div>
                        <img src="img/<?php echo $row['hinhanh'] ?>" >
                    </div>
                    <div class="card-bot">
                        <p class="card-title"><?php echo $row['tensanpham'] ?></p>
                        <div class="card-price">
                            <span class="price-default"><?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></span>
							
                            <span class="price-sale"><?php echo number_format($gia_sau_khi_giam,0,',','.').' VNĐ' ?></span>
                            
                        </div>
						</a>
                        <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>" class="box-btn card-btn">Xem sản phẩm</a>
                    </div>
                </div>
             <?php
        }
    ?>
              
                                      
                
            </div>
    </div>
		</div>