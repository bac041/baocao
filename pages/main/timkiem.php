<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
	AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($connect,$sql_pro);
	
?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
	<ul class="product_list">
		 <div class="right">
				
                    <div class="row-product" >  
		<?php
		while($row = mysqli_fetch_array($query_pro)){ 
		?>
		<?php if ($row['trangthai']=='0') {?>
                       <div class="card-product card-product-small">
						
                            <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>">
                                <div class="card-img">
                                    <img src="img/<?php echo $row['hinhanh'] ?>" >
                                </div>
                                <div class="card-bot">
                                    <p class="card-title"><?php echo $row['tensanpham'] ?></p>
                                    <div class="card-price">
										
                                        <p style="color: #c30005"><?php  $gia = $row['giasanpham'];
															   
                        $giam_gia = (float) $row['noidung']/100 ;
                         $gia_sau_khi_giam = $gia - ($gia * $giam_gia);
				     echo number_format($gia_sau_khi_giam,0,',','.').' VNĐ' ?></p>
                                    </div>
                                    <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>" class="box-btn btn-card">Xem Sản Phẩm</a>
                                </div>
                            </a>
                        </div>
						 <?php
                             }
                              ?>
					
						<?php if ($row['trangthai']!='0') {?>
                       <div class="card-product card-product-small">
						
                            <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>">
                                <div class="card-img">
                                    <img src="img/<?php echo $row['hinhanh'] ?>" >
                                </div>
                                <div class="card-bot">
                                    <p class="card-title"><?php echo $row['tensanpham'] ?></p>
                                    <div class="card-price">
                                        <span><?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></span>
                                    </div>
                                    <a href="index.php?quanly=ctsanpham&id=<?php echo $row['id_sanpham'] ?>" class="box-btn btn-card">Xem Sản Phẩm</a>
                                </div>
                            </a>
                        </div>
						 <?php
                             }
                              ?>
		<?php
		} 
		?>
	</ul>
			 </div>
		</div>
