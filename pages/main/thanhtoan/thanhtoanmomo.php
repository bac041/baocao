<?php
header('Content-type: text/html; charset=utf-8');


function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';


$orderInfo = "Thanh toán qua MoMo";
$amount = "10000";
$orderId = time() ."";
$redirectUrl = "http://localhost/baocao/index.php?quanly=thongtinthanhtoan";
$ipnUrl = "http://localhost/baocao/index.php?quanly=thongtinthanhtoan";
$extraData = "";



$requestId = time() . "";
$requestType = "captureWallet";
// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . 
    $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    
$signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);

?>

<?php
// thanhtoanmomo.php

include('../../../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy phương thức thanh toán và mã giỏ hàng từ biểu mẫu
    $payment_method = $_POST['payment_method'];
    $code_cart = $_POST['code_cart'];

    // Cập nhật phương thức thanh toán vào bảng tbl_giohang
    $sql = "UPDATE tbl_giohang SET cart_payment='$payment_method' WHERE code_cart='$code_cart'";
    
    if ($connect->query($sql) === TRUE) {
        echo "Phương thức thanh toán đã được lưu thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $connect->error;
    }

    // Đóng kết nối
    $connect->close();
}

?>
