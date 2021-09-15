<div class="container">
<h1> <?php echo $title ?> </h1>
<?php if( $this->session->flashdata('message')) { ?>
        <div class="alert alert-danger"> <?php echo $this->session->flashdata('message') ?> </div>
<?php } ?>
<div class="jumbotron">

<?php echo form_open('user/usignin', array('id' => 'signinForm', 'class' => 'sign-form'))?>
    <div class="form-group">
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password">
        <?php echo form_error('password', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="User Signin">
    </div></div>
<?php echo form_close() ?>