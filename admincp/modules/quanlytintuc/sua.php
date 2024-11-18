<?php
    $sql_sua="SELECT * FROM tbl_tintuc WHERE id_tintuc='$_GET[idtintuc]' LIMIT 1";
    $result_sua= mysqli_query($connect,$sql_sua);
?>
<p>Sửa tin tức</p>
 <table border="1" width="50%" style="border-collapse: collapse;">
   <form method="POST" action="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $_GET['idtintuc']?>">
    <?php
        while($dong =mysqli_fetch_array($result_sua)){
    ?>
   <tr>
        <th colspan="2">Điền danh mục sản phẩm</th>
    </tr>
    <tr>
        <td>Tên tiêu đề</td>
        <td><textarea name="tieude"  rows="3" cols="50" style="resize: none;"><?php echo $dong['tieude']?></textarea></td>
    </tr>
    
	<tr>
        <td>Hình ảnh tin tức</td>
        <td><input type="file" name="hinhanh" value="<?php echo $dong['hinhanh']?>"></td>
    </tr> 
    
	   <tr>
        <td>Ngày tháng</td>
        <td><input type="text" name="ngaythang" value="<?php echo $dong['ngaythang']?>"></td>
    </tr>
	   <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung"  rows="10" cols="70" style="resize: none;"><?php echo $dong['noidung']?></textarea></td>
    </tr>
	   <tr>
        <td>Trạng thái</td>
        <td><input type="text" name="trangthai" value="<?php echo $dong['trangthai']?>"></td>
    </tr>
	   <tr>

        <td colspan="2"><input type="submit" value="Sửa sản phẩm" name="suatintuc"></td>
    </tr>
    <?php
        }
    ?>
</form>
 </table>