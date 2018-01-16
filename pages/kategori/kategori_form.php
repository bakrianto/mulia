<?php
  include_once("koneksi.php");
if(!empty($_GET['id_kategori'])){
  $q="SELECT * FROM `tb_kategori` WHERE id_kategori='$_GET[id_kategori]'";
  $data=mysqli_fetch_array(mysqli_query($conn, $q));
  $action="?pg=kategori_edit";
}else{
  $action="?pg=kategori_tambah";
}
?>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">
              <?php if(!empty($_GET['id_kategori'])){
                echo "Form Ubah Kategori";
              }else {
                echo "Form Tambah Kategori";
              } ?>  
          </h1>
      </div>
  </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel"><a class="btn btn-info" href="?pg=kategori"><i class="fa fa-chevron-left fa-fw"></i> Kembali</a></div>
        <form class="form" action="<?=$action?>" method="post">
        <table align="center" class="table">
          <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori" class="form-control">
                <option>--Pilih--</option>
                <?php 
                    if ($data[kategori]=='minuman') {
                        echo "<option value=\"minuman\" selected>Minuman</option>";
                        echo "<option value=\"makanan\">Makanan</option>";
                    }elseif ($data[kategori]=='makanan'){
                        echo "<option value=\"minuman\">Minuman</option>";
                        echo "<option value=\"makanan\" selected>Makanan</option>";
                    } else {
                        echo "<option value=\"minuman\">Minuman</option>";
                        echo "<option value=\"makanan\">Makanan</option>";
                    }
                ?>
                </select>
            </td>
          </tr>
          <tr>
            <td>Nama Kategori</td>
            <td><input type="text" name="kategori_menu" class="form-control" value="<?=$data[menu_kategori]?>" /></td>
          </tr>
          <tr>
          <td>
        <?php if($_GET['act']=="edit"){ ?>
        <input type="hidden" name="id_kategori" value="<?=$data[id_kategori]?>" />
        <?php } ?>
        </td><td><button type="submit" class="btn btn-info"><i class="fa fa-save fa-fw"></i> Simpan</button> &nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-repeat fa-fw"></i> Reset</button> </td></tr>
        </table>
        </form>
    </div>
</div>
</div>