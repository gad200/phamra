<?php
$mysqli =  mysqli_connect('localhost', 'meskwhat_pharmacy', 'Mhmh140100', 'meskwhat_pharmacy');
if (!$mysqli) {
    die('Could not Connect MySql Server:' . mysqli_connect_error());
}
