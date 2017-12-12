<?php
	// Authorisation details.
	$username = "hisan.live@outlook.com";
	$hash = "c01be598c9dc4b8da752ede49be4f11e02065c35691119d160cbbc78d82e2f6c";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "APITest"; // This is who the message appears to be from.
	$numbers = array("+94768526186"); // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$sender1 = urlencode($sender);
	$message1 = rawurlencode($message);
	
	
	$data = array('username'=>$username,'hash'=>$hash,'numbers'=>$numbers,"sender"=>$sender1,"message"=>$message1);
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
?>