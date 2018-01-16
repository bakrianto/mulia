<?php
  include_once("koneksi.php");
if(!empty($_GET['id_menu'])){
  $q="SELECT * FROM `tb_menu` WHERE id_menu='$_GET[id_menu]'";
  $data=mysqli_fetch_array(mysqli_query($conn, $q));
  $action="?pg=barang_edit";
}else{
  $action="?pg=barang_tambah";
}
?>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">
              <?php if(!empty($_GET['id_barang'])){
                echo "Form Ubah Barang";
              }else {
                echo "Form Tambah Barang";
              } ?>  
          </h1>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="text-center pull-left"><a class="btn btn-info" href="?pg=barang"><i class="fa fa-chevron-left fa-fw"></i> Kembali</a></div>
          <form class="form" action="<?=$action?>" method="post">
          <table align="center" class="table">
            <tr>
              <td>Kategori Barang</td>
              <td>
                  <select name="id_kategori" class="form-control">
                  <option>--Pilih--</option>
                  <?php
                  $kategori =mysqli_query($conn,"SELECT * FROM `tb_kategori`");
                  while ($kat=mysqli_fetch_array($kategori)) {
                      if ($data['id_kategori']==$kat['id_kategori']) {
                          echo "<option value=\"$kat[id_kategori]\" selected>$kat[menu_kategori]</option>";
                      }else {
                          echo "<option value=\"$kat[id_kategori]\">$kat[menu_kategori]</option>";
                      }
                  }
                  ?>
                  </select>
              </td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td><input type="text" name="nama_menu" class="form-control" value="<?=$data[nama_menu]?>" /></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" class="form-control" value="<?=$data[harga]?>" /></td>
            </tr>
            <tr>
            <td>
          <?php if($_GET['act']=="edit"){ ?>
          <input type="hidden" name="id_menu" value="<?=$data[id_menu]?>" />
          <?php } ?>
          </td><td><button type="submit" class="btn btn-info"><i class="fa fa-save fa-fw"></i> Simpan</button> &nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-repeat fa-fw"></i> Reset</button> </td></tr>
          </table>
          </form>
      </div>
  </div>
</div>