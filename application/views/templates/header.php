<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> | Multiple Images Management in CodeIgniter</title>

    <!-- Bootstrap library -->
    <link rel="stylesheet" href="<?php echo base_url('tamp_public/'); ?>css/custom.css">
    <!-- Stylesheet file -->
    <link rel="stylesheet" href="<?= base_url('tamp_public/'); ?>css/bootstrap.min.css">


    <!-- javascript -->
    <script src="<?php echo base_url('tamp_public/'); ?>js/bootstrap.min.js"></script>
    <script>
            function deleteImage(id){
                var result = confirm("Are you sure to delete?");
                if(result){
                    $.post( "<?php echo base_url('manage_gallery/deleteImage'); ?>", {id:id}, function(resp) {
                        if(resp == 'ok'){
                            $('#imgb_'+id).remove();
                            alert('The image has been removed from the gallery');
                        }else{
                            alert('Some problem occurred, please try again.');
                        }
                    });
                }
            }
    </script>

</head>
<body>