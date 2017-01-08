<?php
    require_once ('api/db.php');
    require_once ('api/customerapi.php');
      
      if(isset($_GET['duser']) ) {
      	customer_delete($_GET['id']);
      }
    
        if(isset($_POST['name']) && isset($_POST['phone'])) {
           echo ('test'); 
        $result = customer_update($_POST['id'], $_POST['name'], $_POST['phone']);
        if ($result)  {
            echo ('success'); 
        } else {
            echo ('failed');
        }
    } 
    
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>
  </head>

  <body>

    <div class="container">
	
	
	
	   <?php      
                                            
  $users = customer_get('ORDER BY `id` DESC');
    if($users == NULL)
	//  die ('problem');
	echo ('problem');
	$ucount = @count($users);
	if($ucount == 0)
	echo ('No users');
	?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <p>...</p>
  </div>

  <!-- Table -->
<table class="table"> 
	<thead>
            <tr> 
			 <th>#</th> 
			 <th>Name</th> 
			 <th>Mobile</th>  
			 <th>Action</th>
		 </tr>
	</thead> 
	<tbody>
		<?php
		  for($i = 0 ; $i < $ucount; $i++)
	          { 
               		$user = $users[$i];
			?>
		 	 <tr> 
			 	 <th scope="row"><?php echo $user->id ?></th> 
		 		 <td><?php echo $user->name ?></td> 
			 	 <td><?php echo $user->mobile ?></td>  
			 	 <td><a href='view1.php?id=<?php echo $user->id ?>'> view </a> <a href='?id=<?php echo $user->id ?>&&duser=123'> delete </a> <a href='?id=<?php echo $user->id ?>&&uuser=111'> update </a> </td>
		 	 </tr> 
		 	<?php } ?>

	</tbody> 
</table>
</div>
	
	<?php     if(isset($_GET['uuser'])) { 
		$p_customer = customer_get_by_id($_GET['id']);
	?>
      <form method="post">
  <div class="form-group">
  	    <input name="id" hidden value="<?php echo $p_customer->id ?>" >
    <label >name</label>
    <input name="name" value="<?php echo $p_customer->name ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label >phone</label>
    <input name="phone"  value="<?php echo $p_customer->mobile ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="yourmobile">
 	 </div>
    <button type="submit" class="btn btn-primary">Submit</button>
      </form>
	<?php } ?>
	
    </div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>






