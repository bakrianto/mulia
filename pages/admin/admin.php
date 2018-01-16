<?php if ($_SESSION['userid']==1) {?>
<?php
include_once("koneksi.php");
$q=mysqli_query($conn, "select * from tb_admin");
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Daftar Admin</h1>
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
              <a class="btn btn-info text-center" href="index.php?pg=admin_form"><i class="fa fa-plus fa-fw"></i> Tambah</a>
        </div>
    </div>
    <div class="panel panel-default">          
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Nama admin</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
          </tr>
        <?php
        while ($data=mysqli_fetch_assoc($q)){ 
        $i++;?>
          <tr>
            <td><?=$i?></td>
            <td><?=$data["nama_lengkap"]?></td>
            <td><?=$data["username"]?></td>
            <td><?=$data["password"]?></td>
            <td><a class="btn btn-info" href="?pg=admin_form&act=edit&id_admin=<?=$data["id_admin"]?>"><i class="fa fa-pencil fa-fw"></i> Edit</a>&nbsp;
        <a class="btn btn-danger" href="?pg=admin_hapus&id_admin=<?=$data["id_admin"]?>"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></td>
          </tr>
        <?php } ?>
        </table>
    </div>
</div>

<?php } ?>