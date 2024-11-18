<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="css/style_footer.css">
	<link rel="stylesheet" href="css/style_banner.css">
	<link rel="stylesheet" href="css/style_show_product.css">
	<link rel="stylesheet" href="css/style_tintuc.css">
	<link rel="stylesheet" href="css/style_tongtintuc.css">
	<link rel="stylesheet" href="css/Gioithieu.css">
    <link rel="stylesheet" href="css/style_sanpham.css">
	 <link rel="stylesheet" href="css/style_cart.css">
	<link rel="stylesheet" href="css/style_ctsanpham.css">
	
    <title>ShopGiay</title>
</head>
<body>
    
    <div >
        <?php
            session_start();
            include("admincp/config/connect.php");	    
            include("pages/menu.php");	
		     
		    include("pages/main.php");    		    
		    include("pages/footer.php");
		   
           
        ?>
    </div>
</body>
<script type="text/javascript" src="js/modal.js"></script>
</html>
