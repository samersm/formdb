<?php
    require_once ('api/db.php');
    require_once ('api/customerapi.php');
    
    $p_customer = customer_get_by_id($_GET['id']);

?>

<?php
    echo $p_customer->name;
?>
<br />
<?php
    echo $p_customer->mobile;
?>


