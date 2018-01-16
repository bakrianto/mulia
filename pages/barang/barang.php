<?php
include_once("koneksi.php");
$q=mysqli_query($conn, "SELECT * FROM `tb_menu` INNER JOIN `tb_kategori` ON `tb_kategori`.`id_kategori`=`tb_menu`.`id_kategori`");
?>
<?php if ($_SESSION['userid']==1) {?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Data Barang</h1>
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
            <a class="btn btn-info text-center" href="index.php?pg=barang_form"><i class="fa fa-plus fa-fw"></i> Tambah</a>
        </div>
    </div>
    <div class="panel panel-default">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($data=mysqli_fetch_assoc($q)){ 
            $i++;?>
            <tr>
                <td><?=$i?></td>
                <td><?=$data["kategori"]?>M<?=$data["id_menu"]?></td>
                <td><?=$data["nama_menu"]?></td>
                <td><?=$data["menu_kategori"]?></td>
                <td><?=$data["harga"]?></td>                
                <td><a class="btn btn-info" href="?pg=barang_form&act=edit&id_menu=<?=$data["id_menu"]?>"><i class="fa fa-pencil fa-fw"></i> Edit</a>&nbsp;
                <a class="btn btn-danger" href="?pg=barang_hapus&id_menu=<?=$data["id_menu"]?>"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php } else { ?>
    <div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Data Barang</h1>
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
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
            </tr>
            <?php
            while ($data=mysqli_fetch_assoc($q)){ 
            $i++;?>
            <tr>
                <td><?=$i?></td>
                <td><?=$data["kategori"]?><?=$data["id_menu"]?></td>
                <td><?=$data["nama_menu"]?></td>
                <td><?=$data["menu_kategori"]?></td>
                <td>Rp. <?=$data["harga"]?>, 00</td>                
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php } ?>