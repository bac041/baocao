<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
<p>Thêm danh mục sản phẩm</p>
 <table class="table" border="1" width="50%" style="border-collapse: collapse;">
   <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
    <tr>
        <th colspan="2">Điền danh mục sản phẩm</th>
    </tr>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc" ></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu"></td>
    </tr>
	   <tr>
        <td>Hình ảnh</td>
        <td><input type="file"  name="hinhanhdm"></td>
    </tr>
    <tr>

        <td colspan="2"><input type="submit" value="Thêm danh mục sản phẩm" name="themdanhmuc"></td>
    </tr>
</form>
 </table>
</body>
</html>