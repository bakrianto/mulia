<?php
  include_once("koneksi.php");
if(!empty($_GET['id_admin'])){
  $q="select * from tb_admin where id_admin='$_GET[id_admin]'";
  $data=mysqli_fetch_array(mysqli_query($conn, $q));
  $action="?pg=admin_edit";
}else{
  $action="?pg=admin_tambah";
}
?>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">
              <?php if(!empty($_GET['id_admin'])){
                echo "Form Ubah Admin";
              }else {
                echo "Form Tambah Admin";
              } ?>  
          </h1>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="panel text-center pull-left"><a class="btn btn-info" href="?pg=admin"><i class="fa fa-chevron-left fa-fw"></i> Kembali</a></div>
          <form class="form" action="<?=$action?>" method="post">
          <table align="center" class="table">
            <tr>
              <td>Nama admin</td>
              <td><input type="text" name="nama_lengkap" class="form-control" value="<?=$data[nama_lengkap]?>" /></td>
            </tr>
            <tr>
              <td>Username</td>
              <td><input type="text" name="username" class="form-control" value="<?=$data[username]?>" /></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password" name="password" class="form-control"/></td>
            </tr>
            <tr>
            <td>
          <?php if($_GET['act']=="edit"){ ?>
          <input type="hidden" name="id_admin" value="<?=$data[id_admin]?>" />
          <?php } ?>
          </td><td><button type="submit" class="btn btn-info"><i class="fa fa-save fa-fw"></i> Simpan</button> &nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-repeat fa-fw"></i> Reset</button> </td></tr>
          </table>
          </form>
      </div>
  </div>
</div>