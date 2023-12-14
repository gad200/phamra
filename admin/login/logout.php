<?php


session_start();
ob_start();
include '../../db.php';

session_destroy();
header('location:index.php');
ob_end_flush();
