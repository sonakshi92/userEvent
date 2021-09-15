<div class="container">
<h1> <?php echo $title; ?> </h1>
<?php if($chkAdminExist == 0){ ?>
    <div class="col-lg-4">
        <?php echo anchor("admin/asignup", "Admin Register", ['class'=>'btn btn-primary']); ?>
<?php } ?>
</div>