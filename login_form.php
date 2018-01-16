<div class="container text-center">
    <h2>PROGRAM APRIORI TOKO MULIA</h2>
</div>
<div class="container">
<div class="col-md-4 col-md-offset-4 form-login" style="margin-top: 150px;"> 
    <?php
    /* handle error */
    if (isset($_GET['msg'])) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=$_GET['msg'];?>
        </div>
    <?php endif;?>
 
        <div class="outter-form-login well">
            <form action="login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Admin</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
 
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                
                <input type="submit" class="btn btn-block btn-primary" value="LOGIN" />
                
            </form>
        </div>
    </div>
</div>