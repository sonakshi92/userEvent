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
    <?php// print_r($eventdata); ?>
    
    <tbody>
        <?php if(count($userdata)): ?>
        <?php foreach( $userdata as $row ):?>
        <tr>
            <td> <?php echo $row->name; ?> </td>
            <td> <?php echo $row->email; ?> </td>
            <td> <?php echo $row->created_at; ?> </td>
            <td> <?php echo anchor("admin/user/{$row->id}", "VIEW EVENT", ['class'=>'btn btn-success']); ?> 
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