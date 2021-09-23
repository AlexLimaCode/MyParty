<?php

$name = trim(stripslashes($_POST['name']));
$email = trim(stripslashes($_POST['email']));
$subject = trim(stripslashes($_POST['subject']));
$contact_message = trim(stripslashes($_POST['message']));


$msg = "Nuevo mensaje a MyParty, de ".$name." - ".$email." con lo siguiente: ".$message;
$msg = wordwrap($msg, 70, "\r\n");
$mail = mail($email, "Mensaje A MyParty", $msg);
header('location:../index.php');


?>