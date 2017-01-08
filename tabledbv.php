<?php
    require_once ('api/db.php');
    require_once ('api/customerapi.php');
    
    $user = customer_get_by_id($_GET['id']);

?>

<h1><?php echo $user->name; ?></h1>
<h1>test</h1>