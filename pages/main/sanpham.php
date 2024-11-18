
<?php
    $sql_cate ="SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate =mysqli_query($connect,$sql_cate);
    $row_title =mysqli_fetch_array($query_cate);
     ?>
     <p></p>
     <!--<h5> Danh mục |  
    
     </h5>-->
  <div class="container">
        <div class="container-main">
            <div class="top">
                <div class="top-contentleft">
                    <a class="text" href="index.php">TRANG CHỦ</a>
                    <p> &nbsp; / &nbsp;&nbsp; </p>
                    <a class="text" href="Sanpham.html" style="color: black;"><b>SẢN PHẨM</b></a>
					 <p> &nbsp; / &nbsp;&nbsp; </p>
                    <p class="text" style="color: black;"><b><?php 
            if(isset($row_title['tendanhmuc'])){
                echo $row_title['tendanhmuc'];
            }else{
                echo "lỗi không lấy được data";
            } ?></b></p>
                </div>
                <div class="top-contentright">
                    <p class="text"> Hiển thị một kết quả duy nhất </p>
                    <select style="width: 255px;height: 38px;" id="option" name="option"> 
                        <option class="text" value=" Thứ tự mặc định">Thứ tự mặc định</option>
                        
                        <option class="text" value="Thứ tự theo giá: thấp đến cao">Thứ tự theo giá: thấp đến cao </option>
                        <option class="text" value="Thứ tự theo giá: cao xuống thấp">Thứ tự theo giá: cao xuống thấp</option>
                    </select>
                </div> 
            </div>
			<?php
              $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
              $query_danhmuc=mysqli_query($connect,$sql_danhmuc);   
              ?>
            <div class="bottom">
                <div class="left">
                    <div class="row1">               
                        <b class="text">DANH MỤC</b>
                        <div class="row-main">
							<?php while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){?>
	                        
                            <div class="block" >
                                <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><img class="block-img" src="img/<?php echo $row_danhmuc['hinhanhdm']?>" ></a>
                                <div class="block-main">
                                    <p><a class="text" href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"> <?php echo $row_danhmuc['tendanhmuc']?></a></p>
                                    
                                </div>	
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                    <?php
              $sql_tintuc="SELECT * FROM tbl_tintuc WHERE trangthai=1 ORDER BY id_tintuc DESC";
              $query_tintuc=mysqli_query($connect,$sql_tintuc);   
              ?>
                    <div class="row1">
                        <b class="text">BÀI VIẾT MỚI NHẤT</b>
						<?php while($row_tintuc=mysqli_fetch_array($query_tintuc)){?>
                        <div class="row-main">                                             
                            <div class="block">
                                <a href="index.php?quanly=tintuc&id=<?php echo $row_tintuc['id_tintuc'] ?>"><img class="block-img img-circel" src="img/tintuc/<?php
																				   echo $row_tintuc['hinhanh']?>" ></a>
                                <div class="block-mains">
                                    <p style="font-size: 16px"><a class="text" href="index.php?quanly=tintuc&id=<?php echo $row_tintuc['id_tintuc'] ?>"> <?php echo $row_tintuc['tieude'] ?></a></p>
                                </div>  
                            </div>
                        </div>
						 <?php } ?>
						
                    </div>
                </div>
	<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_show =mysqli_query($connect,$sql_show);
   
    ?>
				
                <div class="right">
				
                    <div class="row-product" >                                             
						<?php
                          while($row_pro=mysqli_fetch_array($query_show)){
                            ?>   
						 <?php if ($row_pro['trangthai']=='0') {?>
                       <div class="card-product card-product-small">
						
                            <a href="index.php?quanly=ctsanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                                <div class="card-img">
                                    <img src="img/<?php echo $row_pro['hinhanh'] ?>" >
                                </div>
                                <div class="card-bot">
                                    <p class="card-title"><?php echo $row_pro['tensanpham'] ?></p>
                                    <div class="card-price">
                                        <p style="color: #c30005"><?php  $gia = $row_pro['giasanpham'];
                        $giam_gia = (float) $row_pro['noidung']/100 ;
                         $gia_sau_khi_giam = $gia - ($gia * $giam_gia);
				     echo number_format($gia_sau_khi_giam,0,',','.').' VNĐ' ?></p>
                                    </div>
                                    <a href="index.php?quanly=ctsanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="box-btn btn-card">Xem Sản Phẩm</a>
                                </div>
                            </a>
                        </div>
						 <?php
                             }
                              ?>
						
						<?php if ($row_pro['trangthai']!='0') {?>
                       <div class="card-product card-product-small">
						
                            <a href="index.php?quanly=ctsanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                                <div class="card-img">
                                    <img src="img/<?php echo $row_pro['hinhanh'] ?>" >
                                </div>
                                <div class="card-bot">
                                    <p class="card-title"><?php echo $row_pro['tensanpham'] ?></p>
                                    <div class="card-price">
                                        <span><?php echo number_format($row_pro['giasanpham'],0,',','.').' VNĐ' ?></span>
                                    </div>
                                    <a href="index.php?quanly=ctsanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="box-btn btn-card">Xem Sản Phẩm</a>
                                </div>
                            </a>
                        </div>
						 <?php
                             }
                              ?>
						<?php
                             }
                              ?>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
