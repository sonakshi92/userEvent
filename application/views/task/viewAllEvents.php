<h1> <?php echo $title ?></h1>
 <h3> Total events created:- <?php echo $totalEvent; ?> </h3>
<br><br>
<table class="table table-hover myTable">
    <thead>
        <tr>
            <th>  Event </th>
            <th>  CREATED AT</th>
        </tr>
    </thead>
    <?php  //print_r($viewEvent); ?>
    
    <tbody>
        <?php if(count($viewEvent)): ?>
        <?php foreach( $viewEvent as $row ):?>
        <tr>
            <td> <?php echo $row->event; ?> </td>
            <td> <?php echo $row->created_at; ?> </td>
            </td>

        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td> <h3> <?php echo "NO EVENTS CREATED by USER" ?> </h3> </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
    </div>