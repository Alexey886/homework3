<?php
namespace PhpChat\App;
require 'functions.php';
require 'imessage.php';
require 'message.php';
use PhpChat\classes as classes;
use PhpChat\Functions as Functions;



if (isset($_POST['str'])) {
	$mes = json_decode($_POST['str'], true);
	file_put_contents(__DIR__ . '/data/message.txt', $mes['usr']);
	if($mes['usr'] == "Admin" || $mes['usr'] == "admin")
	{
		$msg = new classes\Admin_message($_POST['str']);	
		$msg -> save();
	}
	else
	{
			$msg = new classes\Messag($_POST['str']);	
			$msg -> save();
	}

	
	
} 
else {
	$msg = new classes\Messag('');
	$messages = $msg -> read();
	Functions\sendMessages($messages);
}
?>