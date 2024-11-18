<?php
    $sql_lietke="SELECT * FROM tbl_tintuc ORDER BY id_tintuc DESC";
    $result_lietke= mysqli_query($connect,$sql_lietke);
?>
<p>Liệt kê Tin Tức</p>
 <table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
     <tr>
         <td>ID</td>
         <td>Tiêu đề</td>    
		  <td>Hình ảnh</td>
		  <td>Ngày tháng</td>
		  <td>Nội dung</td>
		  <td>Trạng thái</td>
     </tr>
     <?php
    $i=0;
    while($row=mysqli_fetch_array($result_lietke)){
        $i++;
    
     ?>
     <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $row['tieude'] ?></td>
         
		 <td><img style="width: 100px" src="../img/tintuc/<?php echo $row['hinhanh']?>"></td>
		 <td><?php echo $row['ngaythang']?></td>
		 <td><?php echo $row['noidung']?></td>
		 <td><?php echo $row['trangthai']?></td>
         <td>
            <a href="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id_tintuc']?>">Xóa</a>|
             <a href="?action=quanlytintuc&query=sua&idtintuc=<?php echo $row['id_tintuc']?>">Sửa</a>
         </td>
     </tr>

     <?php
    }
    ?>
 </table>