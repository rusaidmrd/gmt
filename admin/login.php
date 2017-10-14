<?php 
    require_once("inc/init.php");

    $message="";

    if($session->is_logged_in()) {
        redirect_to("dashboard.php");
    }

    if(isset($_POST['submit'])) {
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);

        // check database to see if email/password exist
        $found_user=User::authenticate($username,$password);

        if($found_user) {
          $session->login($found_user);
          redirect_to("dashboard.php");
          // $message=$found_user->id;
        } else {
          $message="Username/Password combimation incorrect";
        }
    } else {
      $username="";
      $password="";
    }

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin login</title>
    
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- custome styles -->
    <link rel="stylesheet" type="text/css" href="stylesheets/login.css">


  </head>
  <body>
  
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="login.php" method="post">
          <input type="text" placeholder="username" name="username"/>
          <input type="password" placeholder="password" name="password"/>
          <button type="submit" name="submit">login</button>
          <p class="error"><?php echo $message; ?></p>
        </form>
      </div><!-- end of form -->
    </div><!-- end of login-page -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </body>
</html>
