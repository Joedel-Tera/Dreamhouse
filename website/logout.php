<?php
session_start();
require_once '../common/class.users.php';

session_destroy();

$user = new USER();

$user->redirect('index.php');

?>