<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .order-details {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .order-details h3 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .product-list {
            list-style-type: none;
            padding: 0;
        }
        .product-list li {
            margin-bottom: 10px;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="order-details">
                    <h3>Chi tiết đơn hàng</h3>
                    <p><strong>Mã đơn hàng:</strong> <?php echo $code_order; ?></p>
                    <p><strong>Ngày đặt hàng:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
                    <h4>Danh sách sản phẩm:</h4>
                    <ul class="product-list">
                        <?php
                        // Hiển thị các sản phẩm đã thanh toán từ session hoặc cơ sở dữ liệu
                        session_start();
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "<li><strong>Sản phẩm:</strong> " . $value['ten_sanpham'] . " - <strong>Số lượng:</strong> " . $value['soluong'] . "</li>";
                            }
                        }
                        ?>
                    </ul>
                    <p><strong>Phương thức thanh toán:</strong> <?php echo $cart_pay; ?></p>
                    <p><strong>Ngày giao hàng dự kiến:</strong> <?php echo date('d/m/Y', strtotime('+3 days')); ?></p>
                    <a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
