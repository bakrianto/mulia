<?php
include_once("koneksi.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <h1>Apriori</h1>
        </div>
        <div class="pull-right">
            <p id="realtgl" class="datetime"></p>
            <p id="realwaktu" class="datetime"></p>
        </div>
    </div>
</div>
<hr style="margin-top: 0px; ">
<div class="row">
    <div class="col-md-12">   
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="?pg=apriori_proses" method="post">
                    <div class="form-inline">
                      <div class="form-group">
                        <label for="exampleInputName2">Min. Support</label>
                        <input type="text" class="form-control" name="min_support" placeholder="50">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputName2">Min. Confiden</label>
                        <input type="text" class="form-control" name="min_confiden" placeholder="70">
                      </div>
                      <button type="submit" class="btn btn-primary">lihat</button>  
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <?php 
                    if (isset($_GET['get'])) {
                        // if (empty($_GET['s']) && empty($_GET['c'])) {
                        //     $minsupport=50;
                        //     $minconfiden=70;
                        // }else {
                        //     $minsupport=$_GET['s'];
                        //     $minconfiden=$_GET['c'];
                        // }
                        $minsupport=$_GET['s'];
                        $minconfiden=$_GET['c'];

                        if ($_GET['get']=='apriori') {
                            include 'inc.item_1.php';
                        }elseif ($_GET['get']=='apriori_2') {
                            include 'inc.item_2.php';
                        }       
                    }
                ?>
            </div>
        </div>
    </div>
</div>