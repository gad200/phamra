<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'pharmacy');
if (!$mysqli) {
      die('Could not Connect MySql Server:' . mysqli_connect_error());
}
