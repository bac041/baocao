 
<?php
                #include ("sidebar/sidebar.php");
            ?>
            <div class="maincontent">
              
                <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                        if ($bientam=='gioithieu'){
                            include("main/gioithieu.php");
							$tly="active";
							
                        }elseif ($bientam=='giohang'){ 
                            include("main/giohang/cart.php");
							
						}elseif ($bientam=='tongtintuc'){ 
                            include("main/tongtintuc.php");
							
                        }elseif ($bientam=='dangky'){ 
                            // include("main/dangky.php");
                            header("Location:signin/signin.php");  
							
                        }elseif ($bientam=='contact'){ 
                            include("main/contact.php");
							
                        }elseif ($bientam=='allsanpham'){ 
                            include("main/allsanpham.php"); 
							
						}elseif ($bientam=='tangdan'){ 
                            include("main/sapxeptangdan.php"); 
							
						}elseif ($bientam=='giamdan'){ 
                            include("main/sapxepgiamdan.php"); 
						
						}elseif ($bientam=='ctsanpham'){ 
                            include("main/ctsanpham.php");
							
						}elseif ($bientam=='tintuc'){ 
                            include("main/tintuc.php");
							
                        }elseif ($bientam=='dangnhap'){
                            // include("user/loginuser.php");
                            header("Location:user/loginuser.php");    
							
                        }elseif ($bientam=='thongtin'){ 
                            include("main/info.php");
							
						}elseif ($bientam=='danhmuclist'){
                            include("main/sanpham.php");
							
                        }elseif ($bientam=='timkiem'){ 
                            include("main/timkiem.php");
                            
                        
                        }else{
							include("main/includetimkiem.php");
							include("main/banner.php");
							include("main/show_product.php");
							
				?>
				
				<?php
                       
                        }
 ?>