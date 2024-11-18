<?php
if (isset($_POST['emailChange'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $update_email = "update tbl_dangky set email = '$email' where id_khachhang='$id'";
    mysqli_query($connect, $update_email);
}

if (isset($_POST['diaChiChange'])) {
    $id = $_POST['id'];
    $diaChi = $_POST['diaChi'];
    $update_diaChi = "update tbl_dangky set diachi = '$diaChi' where id_khachhang='$id'";
    mysqli_query($connect, $update_diaChi);
}


if (isset($_POST['sdtChange'])) {
    $id = $_POST['id'];
    $sdt = $_POST['sdt'];
    $update_sdt = "update tbl_dangky set sodienthoai = '$sdt' where id_khachhang='$id'";
    mysqli_query($connect, $update_sdt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="css/info.css">-->
	<style>
    body {
        background-color: #F8F8F8;
    }

    h3 {
        color: #222;
        font-weight: bold;
        font-size: 24px;
        margin: 0;
    }

   

    label {
        color: #555;
        font-size: 20px;
        margin-right: 10px;
		
		
    }
		body {
  background: url("img/banner-1.jpg") no-repeat center center fixed;
  background-position: center;
  background-size: cover;
     }
		
    .container-info {
        margin: 70px auto 100px auto;
        max-width: 700px;
        background: #ffffffcc;
        padding: 30px 0px 60px;
        box-shadow: 0px 0px 10px #888888;
		opacity: 90%;
		
    }

    .wrapper-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .infor-main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .infor-main-text {
       
        justify-content: space-between;
        align-items: baseline;
        width: 100%;
        margin-bottom: 10px;
    }

    .infor-text-sql input[type="email"],
    .infor-text-sql input[type="text"] {
        border: 0;
        border-bottom: 1px solid #555;
        outline: none;
        padding: 5px;
        font-size: 19px;
        width: 100%;
        color: #555;
    }

    .infor-text-sql button {
        background-color: #1E1E1E;
        border: none;
        color: #fff;
        padding: 5px;
        
        font-size: 12px;
        
        cursor: pointer;
		inline-size: -webkit-fill-available;
    }

    .infor-text-sql button:hover {
        background-color: #c43425;
    }

    .info-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
		.lb{
			float: left;
		}
</style>

</head>

<body>
    <p><?php
        if (isset($_SESSION['dangky'])) {
            // echo 'Xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
            $id = $_SESSION['dangky'];

            $sql_thongtin = "SELECT * FROM tbl_dangky WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin = mysqli_query($connect, $sql_thongtin);

            while ($row = mysqli_fetch_array($query_thongtin)) {
        ?></p><br>
    <div class="container-info">
      
        <div class="wrapper-info">
            <div class="info-header">
                <h3>Hồ sơ của bạn</h3>
                <p>Quản lý thông tin cá nhân của bạn: <?php echo $row['hovaten']  ?></p>
            </div>
            <div class="infor-main">
                <form method="post" action="">
                    <div class="infor-main-text">
                        <input type="hidden" name="id" value="<?= $row['id_khachhang'] ?>">
                        <label class="lb">Tên Đăng Nhập: </label>
						<h3><?php echo $row['taikhoan']  ?></h3>
                    </div>
                    <div class="infor-main-text">
                        <label for="">Email: </label>
                        <span class="infor-text-sql"><input type="email" name="email" value="<?= $row['email'] ?>" size="<?= (strlen($row['email']) > 30) ? strlen($row['email']) : 30 ?>"> <button name="emailChange" onclick="return alert('bạn đã sửa email thành công')">Sửa</button></span>
                    </div>
                    <div class=" infor-main-text">
                        <label for="">Địa Chỉ: </label>
                        <span class="infor-text-sql"><input type="text" name="diaChi" value="<?= $row['diachi'] ?>" size="<?= (strlen($row['diachi']) > 30) ? strlen($row['diachi']) : 30 ?>"> <button  name="diaChiChange" onclick="return alert('bạn đã sửa địa chỉ thành công')">Sửa</button></span>
                    </div>
                    <div class="infor-main-text">
                        <label for="">Số Điện Thoại: </label>
                        <span class="infor-text-sql"><input type="text" name="sdt" value="<?= $row['sodienthoai'] ?>" size="<?= (strlen($row['sodienthoai']) > 30) ? strlen($row['sodienthoai']) : 30 ?>"> <button  name="sdtChange" onclick="return alert('bạn đã sửa sdt thành công')"> Sửa</button></span>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
            }
        }

?>
</body>

</html>