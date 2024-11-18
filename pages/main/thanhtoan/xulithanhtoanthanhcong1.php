<?php
// thanh_toan_thanh_cong.php
session_start();
include('../../../admincp/config/connect.php');

// Kiểm tra nếu người dùng truy cập trực tiếp vào trang này mà không phải từ quá trình thanh toán
if (!isset($_SESSION['id_khachhang'])) {
    header('Location: index.php'); // Điều hướng về trang chủ hoặc trang khác
    exit;
}

// Hiển thị thông tin đơn hàng và ngày giao hàng dự kiến
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    <style>
        /* CSS styling for displaying order details */
        .order-details {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="order-details">
        <h2>Đơn hàng của bạn đã được thanh toán thành công!</h2>
        <p>Ngày giao hàng dự kiến: <?php echo date('d/m/Y', strtotime('+3 days')); ?></p>
        <h3>Chi tiết đơn hàng:</h3>
        <ul>
            <?php
            // Hiển thị các sản phẩm đã thanh toán từ session hoặc cơ sở dữ liệu
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    echo "<li>Sản phẩm: " . $value['ten_sanpham'] . " - Số lượng: " . $value['soluong'] . "</li>";
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>
