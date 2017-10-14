<?php

	//Database Constants
	defined("DB_SERVER") ? null : define("DB_SERVER", "127.0.0.1");
	defined("DB_USER") ? null : define("DB_USER", "root");
	defined("DB_PASS") ? null : define("DB_PASS", "password");
	defined("DB_NAME") ? null: define("DB_NAME", "gmt_admin");

	//Database Constants for remote server
	// defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
	// defined("DB_USER") ? null : define("DB_USER", "rusaidmr_gmt");
	// defined("DB_PASS") ? null : define("DB_PASS", "k4J6Z18hhi286998");
	// defined("DB_NAME") ? null: define("DB_NAME", "rusaidmr_gmt");

	$dirpath = realpath(dirname(getcwd()));

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	defined('SITE_ROOT') ? null : define('SITE_ROOT', $dirpath.DS.'admin');

?>