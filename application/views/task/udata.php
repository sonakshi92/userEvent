<div class="container">
<h1> Welcome <?php echo $_SESSION['name']; ?> </h1>
<h3> <?php echo $title ?></h3>
<br><br>
<h3> Total Events Created by <?php echo $_SESSION['name']; ?> is <?php echo $count_event ?></h3>

<div class="jumbotron">
<?php if( $this->session->flashdata('message')) { ?>
        <div class="alert alert-success"> <?php echo $this->session->flashdata('message') ?> </div>
<?php } ?>
<?php echo form_open('user/udata', array('id' => 'signupForm', 'class' => 'sign-form'))?>
    <div class="form-group">
        <?php echo form_input(['name' => 'event', 'class' => 'form-control', 'placeholder' => 'EVENT ID', 'value' => set_value('event'),  'autofocus'   => 'autofocus']); ?>
        <?php echo form_error('event', '<div class="error alert alert-danger" style="color:red">', '</div>') ?><br>
    </div>
    <div class="form-group">
        <label class="radio-inline">
        <input type="radio" name="status" value="true" checked > True Positive
        </label>
        <label class="radio-inline">
        <input type="radio" name="status" value="false"> False Positive
        </label>
        <label class="radio-inline">
        <input type="radio" name="status" value="unsure"> Unsure
        </label>
       
        <?php echo form_error('status', '<div class="error alert alert-danger" style="color:red">', '</div>') ?>
    </div>
    <div class="form-group"><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div></div>
<?php echo form_close() ?>