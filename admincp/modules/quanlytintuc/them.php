 <p>Thêm tin tức</p>
 <table border="1" width="50%" style="border-collapse: collapse;">
   <form method="POST" action="modules/quanlytintuc/xuly.php">
    <tr>
        <th colspan="2">Điền tin tức</th>
    </tr>
    <tr>
        <td>Tên tiêu đề tin tức</td>
        <td><textarea name="tieude"  rows="5" cols="50" style="resize: none;"></textarea></td>
    </tr>
    
	   <tr>
        <td>Hình ảnh</td>
        <td><input type="file"  name="hinhanh"></td>
    </tr>
	  <tr>
        <td>Ngày tháng</td>
        <td><input type="text" name="ngaythang"></td>
    </tr>
	  <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung"  rows="10" cols="70" style="resize: none;"></textarea></td>
    </tr>
	   <tr>
        <td>Trạng thái</td>
        <td><input type="text" name="trangthai"></td>
    </tr>
    <tr>

        <td colspan="2"><input type="submit" value="Thêm tin tức" name="themtintuc"></td>
    </tr>
</form>
 </table>