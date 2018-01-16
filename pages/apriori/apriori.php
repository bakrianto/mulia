<?php
include_once("koneksi.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1>Apriori</h1>
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
            <h3>Daftar Data Terseleksi</h3>
        </div>  
            <form action="?pg=apriori_proses"></form>
            <div class="panel-body">
                <?php 
                    if (isset($_GET['get'])) {

                        $minsupport=$_GET['s'];
                        $minconfiden=$_GET['c'];

                        if ($_GET['get']=='apriori') {
                            include 'inc.item_1.php';
                        }elseif ($_GET['get']=='apriori_2') {
                            include 'inc.item_2.php';
                        } 
                        else {
                            include 'inc.item_3.php';
                        }      
                    }
                ?>
            </div>
    </div>
</div>