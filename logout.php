<?php

@include 'config.php';
include "menu.php";

session_start();
session_destroy();

header('location:login_form.php');

?>