<?php
    include_once("koneksi.php");
    if(!empty($_GET['id_setting'])){
      $q="SELECT * FROM `setting` WHERE id_setting='$_GET[id_setting]'";
      $data=mysqli_fetch_array(mysqli_query($conn, $q));
      $action="?pg=setting_edit";
    }else{
      $action="?pg=setting";
    }
?>
<?php if ($_SESSION['userid']==2) {?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h3>Support & Confiden</h3>
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
        <div class="col-md-12">   
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="<?=$action?>" method="post">

                          <div class="form-inline">
                            <label for="exampleInputName2" style="width: 200px; padding-top: 10px; padding-bottom: 10px">Minimal Support</label>
                            <input type="text" class="form-control" style="width: 50px" name="minsupport" value="<?=$data[minsupport]?>"> %
                          </div> 
                          <div class="form-inline">
                            <label for="exampleInputName2" style="width: 200px; padding-top: 10px; padding-bottom: 10px">Minimal Confidene</label>
                            <input type="text" class="form-control" style="width: 50px" name="minconfiden" value="<?=$data[minconfiden]?>"> %
                          </div>
                          <?php if($_GET['act']=="setting"){ ?>
                          <input type="hidden" name="id_setting" value="<?=$data[id_setting]?>" />
                          <?php } ?>
                          <button type="submit" class="btn btn-primary">Simpan</button>  

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>