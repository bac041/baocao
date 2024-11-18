<?php
session_start();
include('../../../admincp/config/connect.php');

if (isset($_POST['redirect'])) {
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0, 9999); // random từ 0 đến 4 số
    $cart_pay = $_POST['payment'];

    $insert_cart = "INSERT INTO tbl_giohang(id_khachhang, code_cart, cart_status, cart_payment) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $cart_pay . "')";
    $cart_query = mysqli_query($connect, $insert_cart);

    if ($cart_query) {
        // Thêm giỏ hàng chi tiết
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];

            $insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham, code_cart, soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
            mysqli_query($connect, $insert_order_details);
        }

        // Điều hướng đến trang thanh toán thành công
        header('Location: thanh_toan_thanh_cong.php');
        exit; // Đảm bảo kết thúc kịch bản PHP sau khi điều hướng
    } else {
        // Xử lý khi có lỗi xảy ra trong quá trình thêm giỏ hàng
        // Có thể điều hướng đến trang lỗi hoặc xử lý khác tại đây
        echo "Đã xảy ra lỗi trong quá trình thanh toán.";
    }
}
?>
