<?php
    $mailFrom = 'yourmail@mail.com';
    $mailTo = 'yourmail@mail.com';

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "testFrom@test.com";
    $to = "testTo@test.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>