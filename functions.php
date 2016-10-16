<?php
namespace PhpChat\Functions;
define('DATA_FILE', __DIR__ . '/data/messages.txt');



function sendMessages($messages) 
{
	header('Content-Type: application/json');
	echo json_encode($messages);
}

?>