<?php
// Get Data 
$firstname = strip_tags($_POST['firstname']);
$middlename = strip_tags($_POST['middlename']);
$lastname= strip_tags($_POST['lastname']);
$email = strip_tags($_POST['email']);
$emid = strip_tags($_POST['emid']);
$type = strip_tags($_POST['type']);
$Reason = strip_tags($_POST['Reason']);
$starting = strip_tags($_POST['starting']);
$end = strip_tags($_POST['end']);
$number = strip_tags($_POST['number']);

// Send Message
mail( "srivastavasankalp.cs@gmail.com", "Contact Form Submission",
"FirstName: $firstname\n MiddleName: $middlename\n LastName: $lastname\n Email: $email\n Employee Id: $emid\n Type Of leave: $type\nReason: $Reason\n Date of Leave: $starting\n Till Date: $end\n Numberof Days: $number",
"From: Forms <saksrivastava2@gmail.com>" );
?>