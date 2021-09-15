<div class="container">
<h1> <?php echo $title ?></h1>
<div class="jumbotron">

<?php echo form_open('admin/asignup', array('id' => 'signupForm', 'class' => 'sign-form'))?>
    <div class="form-group">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
        <?php echo form_error('name', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password">
        <?php echo form_error('password', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="password" name="passconf" id="passconf" placeholder="Confirm Password">
        <?php echo form_error('passconf', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="number" name="mobile" id="mobile" placeholder="Mobile No" value="<?php echo set_value('mobile'); ?>">
        <?php echo form_error('mobile', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="SignUp as Admin">
    </div></div>
<?php echo form_close() ?>