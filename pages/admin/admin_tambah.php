<?php
include_once("koneksi.php");
$q="INSERT INTO `tb_admin`(`id_admin`, `username`, `password`, `nama_lengkap`) VALUES 
(NULL,'$_POST[username]','$_POST[password]','$_POST[nama_lengkap]')";
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");.
echo "<script>
	window.location='index.php?pg=admin';
</script>";
?>
