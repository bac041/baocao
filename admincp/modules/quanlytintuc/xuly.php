<?php
    include "../../config/connect.php";
    $tieude=$_POST['tieude'];
    $hinhanh = $_POST['hinhanh'];
	$ngaythang = $_POST['ngaythang'];
	$noidung = $_POST['noidung'];
	$trangthai = $_POST['trangthai'];

    if(isset($_POST['themtintuc'])){
        $sql_them="INSERT INTO tbl_tintuc(tieude,hinhanh,ngaythang,noidung,trangthai) VALUE('".$tieude."','".$hinhanh."','".$ngaythang."','".$noidung."','".$trangthai."'); ";
        mysqli_query($connect,$sql_them);
        header('Location:../../index.php?action=quanlytintuc&query=them');
		
    }elseif(isset($_POST['suatintuc'])){
        $sql_sua="UPDATE tbl_tintuc SET tieude='".$tieude."',hinhanh='".$hinhanh."',ngaythang='".$ngaythang."',noidung='".$noidung."',trangthai='".$trangthai."' WHERE id_tintuc='$_GET[idtintuc]'";
        mysqli_query($connect,$sql_sua);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }else{
        $id=$_GET['idtintuc'];
        $sql_xoa="DELETE FROM tbl_tintuc WHERE id_tintuc ='".$id."';";
        mysqli_query($connect,$sql_xoa);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }
?>