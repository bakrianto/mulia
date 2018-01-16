<?php
include_once("koneksi.php");
$pas = $_POST['password'];
if (empty($pas)) {
	$q="update tb_admin set 
	nama_lengkap='$_POST[nama_lengkap]',username='$_POST[username]'
 	where id_admin='$_POST[id_admin]'";
}else {
	$q="update tb_admin set 
	nama_lengkap='$_POST[nama_lengkap]',username='$_POST[username]',password='$pas'
 	where id_admin='$_POST[id_admin]'";
}
mysqli_query($conn, $q);
//Header("Location:index.php?pg=admin");
echo "<script>
	window.location='index.php?pg=admin';
</script>";
?>
<!-- <script>
	window.location="index.php?pg=admin";alert('dadsada');
</script> -->