<?php if( $this->session->flashdata('message')) { ?>
        <div class="alert alert-success"> <?php echo $this->session->flashdata('message') ?> </div>
<?php } ?><h1> Welcome <?php echo $_SESSION['name']; ?> </h1>
<h3> <?php echo $title ?></h3>
<br><br><br><br>
<div class="jumbotron">

<h2> <?php echo anchor('admin/asignup', 'ADD Admin')?> </h2>

<h2> <?php echo anchor('admin/usignup', 'ADD User')?> </h2>

<h2> <?php echo anchor('admin/getusers', 'VIEW Users')?> </h2>

</div>