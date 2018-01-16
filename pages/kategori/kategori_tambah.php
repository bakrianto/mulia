<?php
include_once("koneksi.php");
$q="INSERT INTO `tb_kategori`(`id_kategori`, `kategori`, `menu_kategori`) VALUES (NULL,'$_POST[kategori]','$_POST[kategori_menu]')";
mysqli_query($conn, $q);
//Header("Location:../../index.php?pg=kategori");
echo "<script>
	window.location='index.php?pg=kategori';
</script>";
?>
