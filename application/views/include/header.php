<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> User Event</a>
            </div>
                <ul class="nav navbar-nav">
                    <li class="active"> <?php echo anchor('admin/index', 'Home') ?> </li>
                    <?php if( $this->session->autenticated){ ?>
                    <li> <?php echo anchor('admin/adata', 'Admin')?></li>
                    <li> <?php echo anchor('admin/getusers', 'VIEW ALL USERS')?></li>

                    <?php }?>

                   
                    <?php if( $this->session->autenticate){ ?>
                    <li><?php echo anchor('user/udata', 'User - Create Event')?></li>
                    <li><?php echo anchor('user/getevent', 'Display Events')?></li>
                    <?php } ?>  

                 </ul>

                <ul class="nav navbar-nav navbar-right">
                        <?php if( $this->session->autenticated){ ?>
                    <li><?php echo anchor('admin/asignup', 'ADD ADMIN')?></li>
                    <li><?php echo anchor('admin/usignup', 'ADD USER')?></li>
                    <li><?php echo anchor('admin/logout', 'Logout')?></li>
                    <?php }?>

                    <?php if( $this->session->autenticate){ ?>
                    <li><?php echo anchor('user/logout', ' Logout')?></li>
                    <?php } ?>  


                    <?php if( !(($this->session->autenticate) || ($this->session->autenticated))){ ?>
                    <li><?php echo anchor('admin/asignin', 'Admin Login')?></li>
                    <li><?php echo anchor('user/usignin', 'User Login')?></li>
                    <?php } ?>

                </ul>
         </div>
           
         

</nav>