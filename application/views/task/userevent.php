<h1> <?php echo $title ?></h1>

<h3> Display Events </h3>
<br><br><br><br>

<table class="table table-hover myTable">
    <thead>
        <tr>
            <th>  Event ID </th>
            <th>  Result </th>
            <th>  Created At </th>
        </tr>
    </thead>
    
    <tbody>
    <?php if(count($eventdata)): ?>
    <?php foreach( $eventdata as $row ):?>
        <tr>
            <td> <?php echo $row->event; ?> </td>
            <td> <?php echo $row->status; ?> </td>
            <td> <?php echo $row->created_at; ?> </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td> <h3> <?php echo "NO EVENTS CREATED" ?> </h3> </td>
            <?php endif; ?>
        </tr>
    </tbody>
</table>