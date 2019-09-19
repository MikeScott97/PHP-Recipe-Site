<?php


require './password.php';

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');


$errors = array();

session_start();
session_destroy();
header('Location: ./index.php');
exit();
 ?>