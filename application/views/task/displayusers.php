<h1> <?php echo $title ?></h1>

<br><br>
<table class="table table-hover myTable">
    <thead>
        <tr>
            <th>  USER NAME </th>
            <th>  EMAIL </th>
            <th>  CREATED AT</th>
            <th>  ACTION</th>
        </tr>
    </thead>
    <?php //print_r($userdata); ?>
    
    <tbody>
        <?php if(count($userdata)): ?>
        <?php foreach( $userdata as $row ):?>
        <tr>
            <td> <?php echo $row->name; ?> </td>
            <td> <?php echo $row->email; ?> </td>
            <td> <?php echo $row->u_created_at; ?> </td>
            <td> <?php echo anchor("admin/viewEvent/{$row->id}", "View Toadys Events", ['class'=>'btn btn-warning']); ?> 
            <?php echo anchor("admin/viewallEvent/{$row->id}", "View All Events", ['class'=>'btn btn-success']); ?> 
            </td>

        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td> <h3> <?php echo "NO USERSS CREATED" ?> </h3> </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
    </div>