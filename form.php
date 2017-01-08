<?php
    require_once ('api/db.php');
    require_once ('api/customerapi.php');
      
       
    if(isset($_POST['name']) && isset($_POST['phone'])) {
           echo ('test'); 
        $result = customer_add($_POST['name'], $_POST['phone']);
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

      <form method="post">
  <div class="form-group">
    <label >name</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label >phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="yourmobile">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
      </form>

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






