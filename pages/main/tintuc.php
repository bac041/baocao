<?php
              $sql_tintuc="SELECT * FROM tbl_tintuc WHERE trangthai=1 ORDER BY id_tintuc DESC";
              $query_tintuc=mysqli_query($connect,$sql_tintuc);   
              ?>
<div class="container">
        <div class="tt-main ct-main">
			<div class="tt-col1 .ct-col1">
				
				<div class="ttcol1-post">
					<div class="post-title">
						<h3>Bài viết mới</h3>
					</div>
							
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
              $sql_cttintuc="SELECT * FROM tbl_tintuc WHERE id_tintuc='$_GET[id]' ORDER BY id_tintuc DESC LIMIT 1";
              $query_cttintuc=mysqli_query($connect,$sql_cttintuc);   
              ?>
			<?php while($row_cttintuc=mysqli_fetch_array($query_cttintuc)){?>
            <div class="ct-col2">
				<div class="ctcol2-main">
					<div class="ctcol2-top">
						
						<div class="ct-top-title">
							<h6>
								<a href="Tintuc.html">Tin tức</a>
							</h6>
							<h1><?php echo $row_cttintuc['tieude']?></h1>
							
						</div>
                        <div class="divider big"></div>
						<div class="ct-top-img">
							<img src="img/tintuc/<?php echo $row_cttintuc['hinhanh']?>" width="810px"  alt="">
						</div>
						<div class="ct-top-main">
							<div class="ct-top-text">
								<p><?php echo $row_cttintuc['noidung']?> </p>
							</div>
								<?php }?>
							<div class="ct-top-social">
								<ul class="social">
									<li class="fb">
										<a href="#"><img src="icon/fb.PNG" height="20px" width="20px" alt="">Facebook</a>
									</li>
									<li class="twitter" >
										<a href="#"><img src="icon/twitter.PNG" height="20px" width="20px" alt="">Twitter</a>
									</li>
									<li class="google">
										<a href="#"><img src="icon/google.PNG" height="20px" width="20px" alt="">Google +</a>
									</li>
									<li class="pinter">
										<a href="#"><img src="icon/pinter.PNG" height="20px" width="20px" alt="">Pinterest</a>
									</li>
									<li class="linkedln">
										<a href="#"><img src="icon/in.PNG" height="20px" width="20px" alt="">Linkedln</a>
									</li>						
								</ul>
							</div>
							<?php
              $sql_tintucs="SELECT * FROM tbl_tintuc  ORDER BY id_tintuc DESC LIMIT 1";
              $query_tintucs=mysqli_query($connect,$sql_tintucs);   
              ?>
							<div class="ct-top-next">
								<div class="ctprev">
									<a href="index.php?quanly=tintuc&id=<?php 
									$row_tintucs=mysqli_fetch_array($query_tintucs);
                                      $id = $_GET['id'];
										$new= $row_tintucs['id_tintuc'];
										if($id==$new){
											$next_id=$new;
										}
										else 
                                      $next_id = $id + 1;
                                      echo "$next_id";
                                     ?> "> &#10094; Bài trước...</a>
								</div>
								<div class="ctnext">
									<a href="index.php?quanly=tintuc&id=<?php 
									
                                      $id = $_GET['id'];
										
										if($id==1){
											$next_id=1;
										}
										else	 
                                      $next_id = $id - 1;
                                      echo "$next_id";
                                     ?> ">  Bài sau... &#10095;</a>
								</div>
							</div>
						</div>
					</div>
					<div class="ctcol2-bot">
						<h3>Trả lời</h3>
						<form class="respond-form">
							<p class="form-note">
								Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *
							</p>
							<p class="form-comment">
								<label>Bình luận</label>
								<textarea></textarea>
							</p>
							<p class="form-name" style="padding-right: 30px;">
								<label> Tên *</label>
								<input type="text">
							</p>
							<p class="form-name" style="padding-right: 15px">
								<label> Email *</label>
								<input type="text">
							</p>
							<p class="form-name" style="padding-left: 15px">
								<label> Trang Web</label>
								<input type="text">
							</p>
							<p class="form-submit">
								<input type="submit" value="PHẢN HỒI">
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
