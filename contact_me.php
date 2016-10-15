<?php

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message']))
   {
       echo 0; die;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = 'kreatornica3@gmail.com';

$email_subject = "Website Contact Form:  $name";

$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

$headers = "From: noreply@kreatornica.com\n";

$headers .= "Reply-To: $email_address";	

mail($to,$email_subject,$email_body,$headers);

echo 1; die;			
