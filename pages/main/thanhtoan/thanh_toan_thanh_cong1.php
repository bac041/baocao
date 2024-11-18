<!-- thanh_toan_thanh_cong.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* CSS styling for displaying order details */
        .order-details {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
         /* CSS tùy chỉnh cho trang thanh toán thành công */
         body {
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .alert {
            margin-top: 20px;
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
            session_start();
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    echo "<li>Sản phẩm: " . $value['tensanpham'] . " - Số lượng: " . $value['soluong'] . "</li>";
                }
            }
            ?>
        </ul>
    </div>
    <a href="../../../index.php" class="btn btn-primary mt-3">Quay Về Trang Chủ</a>
</body>
</html>
