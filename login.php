<?php
$valid=false;
$user = $_POST['username'];
$pass = $_POST['password'];
if(!empty($_POST['username']) && !empty($_POST['password'])){
	include "koneksi.php";
	// login admin
	$q="SELECT * FROM `tb_admin` WHERE `username` ='$user' AND `password`='$pass'";

	if ($q) {
		$qx=mysqli_query($conn, $q);
		if(mysqli_num_rows($qx)>0){
			$valid=true;
			$user=mysqli_fetch_assoc($qx);
			session_start();
				$_SESSION['userid']=$user['id_admin'];
				$_SESSION['usernm']=$user['nama_lengkap'];
			if ($_SESSION['userid']==1) {
				header('location:index.php?pg=beranda');
			} else {
				header('location:index.php?pg=setting&act=setting&id_setting=1');
			}
		}
	} 
}
if($valid==false){
header("location:index.php?msg=Username/Password Salah");
}?>
