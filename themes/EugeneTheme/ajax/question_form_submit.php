<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$nameValid = $emailValid = $phoneValid = $messageValid = true;
$name = $email = $phone = $message = "";

if (empty($_POST["userName"])) {
	$nameValid = false;
} else {
	$name = test_input($_POST["userName"]);
	if (!preg_match("/^[^0-9]+$/",$name))
		$nameValid = false;
}
if (empty($_POST["userEmail"])) {
	$emailValid = false;
} else {
	$email = test_input($_POST["userEmail"]);
	if (!preg_match("/^.+@.+\..+$/i", $email))
		$emailValid = false;
}
if (!empty($_POST["userPhone"])) {
	$phone = test_input($_POST["userPhone"]);
	if(!preg_match("/^[0-9+]{10,13}$/", $phone))
		$phoneValid = false;
}

if (empty($_POST["userMessage"])) {
	$messageValid = false;
} else {
	$message = test_input($_POST["userMessage"]);
}
$resultArray = array(
	'userName' 		=> array(
		'value' 	=> $name,
		'isValid' 	=> $nameValid, 
	),
	'userPhone' 	=> array(
		'value' 	=> $phone,
		'isValid' 	=> $phoneValid, 
	),
	'userEmail' 	=> array(
		'value' 	=> $email,
		'isValid' 	=> $emailValid, 
	),
	'userMessage' 	=> array(
		'value' 	=> $message,
		'isValid' 	=> $messageValid,
	),
);

echo(json_encode($resultArray));

// if ($nameValid && $emailValid && $phoneValid && $messageValid){
// 	$file = fopen('file.txt', 'wb');
// 	fwrite($file, json_encode($resultArray, JSON_UNESCAPED_UNICODE)."\n\n");
// }