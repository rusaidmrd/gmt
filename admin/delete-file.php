<?php
	require_once("inc/init.php");
	if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php 

	if(empty($_GET['id'])) {
		$session->message("No File ID was provided");
		redirect_to("dashboard.php");
	}


	$file=File::find_by_id($_GET['id']);

	if($file && $file->destroy()) {
		$session->message("The file was deleted");
		redirect_to("dashboard.php");
	} else {
		$session->message("The file could not be deleted");
		redirect_to("dashboard.php");
	}

 ?>

 <?php if(isset($database)) { $database->close_connection(); } ?>