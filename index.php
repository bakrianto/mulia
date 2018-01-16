<?php 
error_reporting(0);
session_start(); ?>

<?php
include_once("koneksi.php");
$q=mysqli_query($conn, "SELECT * FROM `setting`");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apriori</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->


</head>

<body>

    <?php if (empty($_SESSION['userid'])) {
        include 'login_form.php';
    } elseif ($_SESSION['userid']==1) {
        include 'admin.php';
    } elseif ($_SESSION['userid']==2) {
        include 'user.php';
    }
    ?>
    <!-- jQuery -->
    <script src="asset/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#detail', function(event) {
                event.preventDefault();
                var faktur = $(this).data('id');
                var url = $(this).data('data');
                // alert(faktur+'_'+url);
                var req = $.ajax({
                    url: url,
                    type: 'POST',
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                    data: {faktur: faktur},
                })
                req.done(function(html) {
                    $('#data-det').html(html);
                })
                req.fail(function(xhr, textStatus, errorThrown) {
                    alert(xhr.responseText);
                })
                
            });
            $('#hide-menu').hide();
            $('#hide-menu2').hide();

            $('#show-menu').on('click', function(event) {
                event.preventDefault();
                $('#hide-menu').toggle();

            });

            $('#show-menu2').on('click', function(event) {
                event.preventDefault();
                $('#hide-menu2').toggle();

            });            
        });
    </script>

    <script type="text/javascript">
      $('input[type="checkbox"]').click(function(){
         var val=$(this).attr('data');

         if ($(this).is(":checked")) {
            $('.'+val).removeAttr('disabled');
            $('.'+val).val(1);
         } else {
            $('#jml.'+val).attr('disabled', 'disabled');
            $('.'+val).val("");
         }
         
      });
    </script>
</body>

</html>
