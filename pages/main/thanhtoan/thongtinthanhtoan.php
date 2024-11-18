<p></p>
<div class="container">
  <?php
  if (isset($_SESSION['id_khachhang'])) {
  ?>
    <div class="arrow-steps clearfix">
      <div class="step "> <span> <a href="../../../index.php?quanly=giohang">Giỏ hàng</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=vanchuyen">Kiểm tra</a></span> </div>
      <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>

    </div>
  <?php
  }
  ?>
  <p></p>
  <div class="ttbody">
    <form action="thanhtoan.php" method="POST">
      <div class="row">
        <h3>Giỏ hàng của bạn</h3>
        <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
          <tr>
            <th>ID</th>
            <th>Mã </th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Số lượng</th>
            <th>Giá </th>
            <th>Thành tiền</th>
            <th></th>
          </tr>
          <?php
          if (isset($_SESSION['cart'])) {
            $i = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
              $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
              $tongtien += $thanhtien;
              $i++;
          ?>
              <tr style="color: black">
                <td><?php echo $i ?></td>
                <!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
                <td><?php echo $cart_item['masp'] ?></td>
                <td><?php echo $cart_item['tensanpham'] ?></td>
                <td><img src="../../../img/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>

                <td>
                  <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                  <?php echo $cart_item['soluong'] ?>
                  <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                </td>

                <td><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                <td><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-success">XÓA</a></td>
              </tr>


            <?php
            }
            ?>

            <tr>
              <td colspan="8">
                <p style="float: left text-align: center;" class="btn btn-success"> Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
                <p style="float: right;"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-success">Xóa Hêt</a></p>
                <div style="clear:both;"> </div>
              </td>
            </tr>
          <?php
          } else {
          ?>
            <tr>
              <td colspan="8">
                <p>Hiện tại giỏ hàng trống</p>
              </td>

            </tr>
          <?php
          }
          ?>

        </table>
      </div>
      <style type="text/css">
        .col-md-4.hinhthucthanhtoan .form-check {
          margin: 11px;
        }

        ul {
          list-style: none;
          padding: 0;
        }

        li {
          margin-bottom: 10px;
        }

        h4 {
          margin-top: 30px;
          font-weight: normal;
        }

        table {
          margin-top: 30px;
        }

        tr th {
          padding: 10px;
          background-color: #b02e38;
          color: #fff;
          font-weight: normal;
        }

        tr td {
          padding: 10px;
          border: 1px solid #ccc;
          background-color: white;
        }

        tr td img {
          max-width: 100%;
        }

        .btn-success {
          background-color: #dc3545;
          color: #fff;
          border: none;
          padding: 8px 20px;
          border-radius: 5px;
          text-decoration: none;
          display: inline-block;
          margin-right: 10px;
        }

        .btn-success:hover {
          background-color: #b02e38;
        }



        /*---*/
        .col-md-4.hinhthucthanhtoan {
          background-color: #f7f7f7;
          border: 1px solid #ccc;
          padding: 20px;
          margin-bottom: 20px;
        }

        h4 {
          font-size: 18px;
          font-weight: bold;
          margin-bottom: 10px;
        }

        .form-check {
          margin-bottom: 10px;
        }

        .btn-danger {
          background-color: #dc3545;
          border-color: #dc3545;
          color: #fff;
          font-weight: bold;
          transition: all 0.3s ease;
          margin: 10px 0 10px 20px;
          padding: 10px;
        }

        .btn-danger:hover {
          background-color: #b02e38;
          border-color: #b02e38;
          cursor: pointer;
        }

        .ttbody {
          background-color: #111111;
          color: #ECECEC;
          text-align: center;
          padding: 10px;
          border-radius: 10px;
        }
      </style>
      <input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
      <div class="col-md-4 hinhthucthanhtoan">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền Mặt" checked>
          <label class="form-check-label" for="exampleRadios1">
            Tiền mặt
          </label>
          <input class="form-check-input" type="radio" name="payment" id="chuyenkhoan" value="Chuyển khoản">
          <label class="form-check-label" for="chuyenkhoan">
            Chuyển khoản
          </label>

          
        </div>
        <input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-danger" id="thantoan-button">
      </div>

      <div>

      </div>

  </div>


  </form>

</div>

<script>
  

  document.addEventListener("DOMContentLoaded", function() {
  // Lấy tham chiếu đến nút "Thanh toán ngay"
  const thanhToanButton = document.getElementById("thantoan-button");

  // Kiểm tra xem nút "Thanh toán ngay" có tồn tại không
  if (thanhToanButton) {
    // Thêm sự kiện click cho nút "Thanh toán ngay"
    thanhToanButton.addEventListener("click", function(event) {
      // Thực hiện các thao tác khi click vào nút
      console.log("Button clicked");
    });
  } else {
    console.error("Không tìm thấy nút thanh toán");
  }
});

</script>

<?php


?>