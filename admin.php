<nav class="navbar navbar-default">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h4 class="navbar-brand" href="index.html">Apriori | Toko Mulia</h4>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <?php echo "$_SESSION[usernm]" ?>&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?pg=admin"><i class="fa fa-user fa-fw"></i> Tambah/Edit</a>
                </li>
                <li class="divider"></li>
                <li><a href="logoff.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</div>
</nav>

<section class="panel panel-default container">
    <div id="navbar" class="navbar-collapse collapse center">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                <a href="index.php?pg=beranda"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <li>
                <a href="index.php?pg=admin"><i class="fa fa-user fa-fw"></i> Data Admin</a>
                </li>                
                <li>
                <a href="index.php?pg=kategori"><i class="fa fa-sitemap  fa-fw"></i> Data Kategori</a>
                </li>
                <li>
                <a href="index.php?pg=barang"><i class="fa fa-list fa-fw"></i> Data Barang</a>
                </li>
                <li>
                <a href="index.php?pg=transaksi"><i class="glyphicon glyphicon-transfer"></i> Data Transaksi</a>
                </li>
                <!-- <li>
                <a href="index.php?pg=apriori_proses"><i class="fa fa-table fa-fw"></i> Apriori</a>
                </li> -->
                <!-- <?php
                while ($data=mysqli_fetch_assoc($q)){ 
                ?>
                <li>
                <a href="?pg=setting&act=setting&id_setting=<?=$data["id_setting"]?>"><i class="glyphicon glyphicon-cog"></i> Setting</a>
                </li>
                <?php } ?> -->
            </ul>
        </div>
    </div> 
</section>

<section style="background-color: #ffffff">
    <?php
    if(empty($_GET['pg']) OR $_GET['pg']=='beranda')include 'beranda.php';

    $link = $_GET['pg'];
    $link = explode("_", $link);
    $folder= $link[0];
    
    include 'pages/'.$folder.'/'.$_GET['pg'].'.php';
    ?>
    
            <!-- /#page-wrapper -->
    <!-- /#wrapper -->
</section>