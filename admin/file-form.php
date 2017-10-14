<?php 
    require_once('inc/init.php');

    if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone_no']) ) {
        $file=new File();
        $today = date("Y/m/d");

     	$file->name=trim($_POST['name']);
     	$file->email=trim($_POST['email']);
     	$file->phone_no=trim($_POST['phone_no']);
        $file->message=trim($_POST['message']);
        $file->dateAdded=$today;

        $file->attach_file($_FILES['t-file']);

        if($file->save()) {
            // success
            echo "success";
        } else {
            // failure
            echo "The file already exists.";
        }

     	// $file =$_FILES['t-file']['name'];
      //   $file_loc = $_FILES['t-file']['tmp_name'];
      //   $file_size = $_FILES['t-file']['size'];
      //   $file_type = $_FILES['t-file']['type'];
      //   move_uploaded_file($file_loc, "files/$file" );

     }

 ?>