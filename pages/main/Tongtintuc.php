

<div class="container">
        <div class="tt-main">
		
            <div class="title">
                <h2>TIN TỨC</h2>
            </div>
			<div class="tt-col1">
				
				<div class="ttcol1-post">
					<div class="post-title">
						<h3>Bài viết mới</h3>
					</div>
					<?php
              $sql_tintuc="SELECT * FROM tbl_tintuc WHERE trangthai=1 ORDER BY id_tintuc DESC";
              $query_tintuc=mysqli_query($connect,$sql_tintuc);   
              ?>
                    <div class="row1">
                       
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
		$begin = ($page*6)-6;
	}

		$sql_tintuc1="SELECT * FROM tbl_tintuc  ORDER BY id_tintuc DESC LIMIT $begin,6";
              $query_tintuc1=mysqli_query($connect,$sql_tintuc1); 
    
    ?>
				
			<div class="tt-col2">
				
				<div class="ttcol2-main">
					<?php while($row_tintuc=mysqli_fetch_array($query_tintuc1)){?>
					<div class="ttcol2-block" >
						<div class="ttcol2-block-main">
							<a href="index.php?quanly=tintuc&id=<?php echo $row_tintuc['id_tintuc'] ?>">
							<div class="ttblock-img">
								<img src="img//tintuc/<?php echo $row_tintuc['hinhanh']?>" alt="">
							</div>
							<div class="ttblock-content">
								<div class="ttblock-title"> 
									<h5><?php echo $row_tintuc['tieude']?></h5>
								</div>
								<div class="divider"></div>
								<div class="ttblock-text">
									<span><?php echo $row_tintuc['noidung']?></span>
								</div>
							</div>
							<div class="ttblock-box">
									<span class="box-date"><?php echo $row_tintuc['ngaythang']?></span><br>
									
							</div>
							</a>
							
						</div>
						 
					</div>
					<?php } ?>
					
					
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
						<li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a href="index.php?quanly=tongtintuc&id=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php
					} 
					?>
					
				</ul>