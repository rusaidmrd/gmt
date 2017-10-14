<?php 

	require_once("inc/init.php");

	if($session->is_logged_in()) {
        $session->logout();
        redirect_to("login.php");
    }


 ?>