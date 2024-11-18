
  <div class="container">
        <div class="container-main">
            <div class="top">
                <div class="top-contentleft">
                    <a class="text" href="index.php">TRANG CHỦ</a>
                    <p> &nbsp; / &nbsp;&nbsp; </p>
                    <a class="text" href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" style="color: black;"><b>SẢN PHẨM</b></a>
					 
                </div>
                <div class="top-contentright">
                    <p class="text"> Hiển thị một kết quả duy nhất </p>
					<Form method="POST" action="index.php?quanly=allsanpham">
                  
						 <button class="text" name="tangdan" value="Thứ tự theo giá: thấp đến cao">Mặc định </button>
						
					</Form>
					<Form method="POST" action="index.php?quanly=tangdan">
                  
						 <button class="text" name="tangdan" value="Thứ tự theo giá: thấp đến cao">Giá &#8595; </button>						
					</Form>
					<Form method="POST" action="index.php?quanly=giamdan">
                  
						 <button class="text" name="giamdan" value="Thứ tự theo giá: thấp đến cao">Giá &#8593;</button>						
					</Form>
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
	if(isset($_GET['id'])){
		$page = $_GET['id'];
	}else{
		$page = 1;
	}
    if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page*12)-12;
	}
    // GET id là lấy id từ bên MENU.php 
    $sql_show ="SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $begin,12";
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
</ul>
<div style="clear:both;"></div>
				<style >
					ul.list_trang {
					    padding: 0px;
					    margin: 0px 0px 20px;
					    
						display:flex;
						justify-content:center;
						
					}
					ul.list_trang li {
					    transform: translate(160px);
					    padding: 5px 13px;
					    margin: 5px;
						float: right;
					    background: burlywood;
					    display: block;
					}
					ul.list_trang li a {
					    color: #EFEFEF;
					    text-align: center;
					    text-decoration: none;
					 
					}
				</style>
				<?php
				$sql_trang = mysqli_query($connect,"SELECT * FROM tbl_sanpham");
				$row_count = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count/10);
				?>
				
				<ul class="list_trang">

					<?php
					
					for($i=1;$i<=$trang;$i++){ 
					?>
						<li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a href="index.php?quanly=allsanpham&id=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php
					} 
					?>
					
				</ul>