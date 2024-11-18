<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./sign_in.css" />
        <title>FORM</title>
    </head>
    <body>
        <div class="main">
            <form action="" method="POST" class="form" id="form-1">
                <h3 class="heading">ĐĂNG KÝ</h3>
                

                <div class="spacer"></div>

                <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="hovaten" type="text" placeholder="VD: Nguyễn Tuấn Anh" class="form-control" />
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="fullname" class="form-label">Tên tài khoản</label>
                    <input id="fullname" name="taikhoan" type="text" placeholder="VD: kimtanhyung259" class="form-control" />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="text"
                        placeholder="VD: email@domain.com"
                        class="form-control"
                    />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input
                        id="password"
                        name="matkhau"
                        type="password"
                        placeholder="Mật khẩu trên 8 ký tự gồm a-z, A-Z, 0-9"
                        class="form-control"
                    />
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input
                        id="password_confirmation"
                        name="rematkhau"
                        placeholder="Nhập lại mật khẩu"
                        type="password"
                        class="form-control"
                    />
                    <span class="form-message"></span>
                </div>                      
                <div class="form-group">
                    <label for="fullname" class="form-label">Số điện thoại</label>
                    <input id="fullname" name="dienthoai" type="text" placeholder="Số điện thoại" class="form-control" />
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="fullname" class="form-label">Địa chỉ</label>
                    <input id="fullname" name="diachi" type="text" placeholder="Địa chỉ" class="form-control" />
                <span class="form-message"></span>
                <input class="form-submit" type="submit" name="dangky" value="Đăng ký">
                <!-- <button class="form-submit" name="dangky" >Đăng ký</button> -->
                <a style="margin-top:12px; font-size:14px;" href="../index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
            </form>
            <div>
                <?php
                    session_start();
                    include('../admincp/config/connect.php');   
				      
                        
				       
                    if (isset($_POST['dangky'])) {
                        $tenkhachhang = $_POST['hovaten'];
                        $taikhoan = $_POST['taikhoan'];
                        $matkhau = md5($_POST['matkhau']);
                        $rematkhau = md5($_POST['rematkhau']);
                        $email = $_POST['email'];
                        $dienthoai = $_POST['dienthoai'];
                        $diachi = $_POST['diachi'];
                    
                        // Kiểm tra điều kiện nhập liệu
                        if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$email || !$dienthoai || !$diachi) {
                            echo '<script>alert("Vui lòng nhập đầy đủ thông tin.")</script>';
                        } elseif ($matkhau != $rematkhau) {
                            echo '<script>alert("Mật khẩu chưa trùng nhau.")</script>';
                        } elseif (strlen($_POST['matkhau']) < 8) {
                            echo '<script>alert("Mật khẩu dài ít nhất 8 ký tự.")</script>';
                        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $_POST['matkhau'])) {
                            echo '<script>alert("Mật khẩu phải chứa ít nhất 1 chữ hoa, 1 chữ thường và 1 số.")</script>';
                        } else {
                            // Kiểm tra tên tài khoản đã tồn tại hay chưa
                            $user_check_query = "SELECT * FROM tbl_dangky WHERE taikhoan = ?";
                            $stmt = $connect->prepare($user_check_query);
                            $stmt->bind_param("s", $taikhoan);
                            $stmt->execute();
                            $result = $stmt->get_result();
                    
                            if ($result->num_rows > 0) {
                                echo '<script>alert("Tên tài khoản đã tồn tại.")</script>';
                            } else {
                                // Thực hiện đăng ký tài khoản
                                $sql_dangky = "INSERT INTO tbl_dangky(hovaten, taikhoan, matkhau, sodienthoai, email, diachi, chucvu) VALUES (?, ?, ?, ?, ?, ?, '0')";
                                $stmt_insert = $connect->prepare($sql_dangky);
                                $stmt_insert->bind_param("ssssss", $tenkhachhang, $taikhoan, $matkhau, $dienthoai, $email, $diachi);
                                $stmt_insert->execute();
                    
                                if ($stmt_insert) {
                                    echo '<script>alert("Đăng ký thành công")</script>';
                                    $_SESSION['dangky'] = $taikhoan;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['id_khachhang'] = $stmt_insert->insert_id;
                    
                                    // Điều hướng sau khi đăng ký thành công
                                    header('Location: ../user/loginuser.php');
                                    exit();
                                } else {
                                    echo '<script>alert("Đăng ký thất bại. Vui lòng thử lại sau.")</script>';
                                }
                            }
                        }
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>
