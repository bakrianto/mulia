<?php if ($_SESSION['userid']==1) {?>
<?php
include_once("koneksi.php");
$q=mysqli_query($conn, "SELECT * FROM `tb_kategori`");
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Daftar Kategori</h1>
        </div>
        <div class="pull-right">
            <p id="realtgl" class="datetime"></p>
            <p id="realwaktu" class="datetime"></p>
        </div>
    </div>
</div>
<hr style="margin-top: 0px; ">
<div class="container">
    <div class="row">
        <div class="panel-heading">
            <a class="btn btn-info text-center" href="?pg=kategori_form"><i class="fa fa-plus fa-fw"></i> Tambah</a>
        </div>
    </div>
    <div class="panel panel-default">
            <table class="table table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                  </tr>
                <?php
                while ($data=mysqli_fetch_assoc($q)){ 
                $i++;?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$data["kategori"]?>/<?=$data["id_kategori"]?></td>
                    <td><?=$data["menu_kategori"]?></td>
                    <td><a class="btn btn-info" href="?pg=kategori_form&act=edit&id_kategori=<?=$data["id_kategori"]?>"><i class="fa fa-pencil fa-fw"></i> Edit</a>&nbsp;
                <a class="btn btn-danger" href="?pg=kategori_hapus&id_kategori=<?=$data["id_kategori"]?>"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></td>
                  </tr>
                <?php } ?>
            </table>
    </div>
</div>
<?php } ?>