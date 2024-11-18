<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .back-ground{
            display: flex;
            background-color: #FF3300;
            background-size: cover;
            text-align: center;
            justify-content: center;
        }
        .menu a{
            display: flex;
            font-size: 20px;
            color: black;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
        }
        .menu a:hover{
            color: #FF9900;
        }
    </style>
</head>
<body>
    <div class="back-ground">
        <ul class="admincp_list">
        
            <li class="menu"><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm </a></li>

            <?php
                if(isset($_SESSION['dangnhap'])){
                    if($_SESSION['dangnhap']=='admin'){
            ?>
                <li class="menu"><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm </a></li>
                <li class="menu"><a href="index.php?action=quanlytintuc&query=them">Quản lý tin tức </a></li>
                <li class="menu"><a href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a></li>
                
            <?php

                    }
            }
            
            ?>
            <li class="menu"><a href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng </a></li>
        </ul>
    </div>
</body>
</html>

