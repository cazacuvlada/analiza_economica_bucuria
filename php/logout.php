<?php

@include '../php/config.php';
session_start();
session_unset();
session_destroy();

header('location:../php/login_form.php');
?>

