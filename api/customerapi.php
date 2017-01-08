<?php
function customer_add($name,$mobile)
{

    global $tf_handle;
    if( (empty($name)) || (empty($mobile)) )
        return false;
    
    $n_name       = @mysql_real_escape_string(strip_tags($name),$tf_handle);
    $n_mobile        = @mysql_real_escape_string(strip_tags($mobile),$tf_handle);

    $query = sprintf("INSERT INTO `customer` VALUE(NULL,'%s','%s')",$n_name,$n_mobile);
    //echo $query;
    $qresult = @mysql_query($query);
    if (!$qresult)
        return false;


    return true;

}


function customer_get($extra = '')
{
    global $tf_handle;
    //$ex = strip_tags($extra);
    $query = sprintf("SELECT * FROM `customer` %s ",$extra);
    $qresult =@mysql_query($query);
    if(!$qresult)
        return null;

    $rcount = @mysql_num_rows($qresult);
    if($rcount == 0)
        return null;

    $users = array();
    for($i=0; $i < $rcount; $i++)
        $users[@count($users)] = @mysql_fetch_object($qresult);


    @mysql_free_result($qresult);

    return $users;

}


function customer_get_by_id($id)
{
    global $tf_handle;
    $n_id    = @mysql_real_escape_string(strip_tags($id),$tf_handle);
    $result = customer_get("WHERE `id` = '$n_id'");

    if ($result != NULL)
        $user = $result[0];
    else
        $user = NULL;

    return $user ;
}

function customer_delete($uid)
{
     $id = (int)$uid;
    if($id == 0)
        return false;
    $query = sprintf("DELETE FROM `customer` WHERE `id` = %d",$id);
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    return true;
  //  $result = tinyf_users_delete(7);
  //  if($result);
}


function customer_update($id,$name,$mobile)
{
    global $tf_handle;
$fields = array();
$query = 'UPDATE `customer` SET ';
if (!empty($name))
{
    $n_name = @mysql_real_escape_string(strip_tags($name),$tf_handle);
    $fields[@count($fields)] = "`name` = '$n_name'";
}
if (!empty($mobile))
{
    $n_mobile = @mysql_real_escape_string(strip_tags($mobile),$tf_handle);
    $fields[@count($fields)] = "`mobile` = '$n_mobile'";
}
$fcount = @count($fields) ;
if($fcount == 1)
{
    $query .= $fields[0].' WHERE `id` = '.$id.'';
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}
    for($i = 0; $i < $fcount; $i++)
    {
        $query .= $fields[$i];
        if($i != ($fcount - 1))
                $query .=' , ';
    }
    $query .= ' WHERE `id` = '.$id.'';
    //echo $query;
    $qresult = @mysql_query($query);
    if(!$qresult)
        return false;
    else
        return true;
}

?>