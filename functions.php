<?php
namespace PhpChat\Functions;
define('DATA_FILE', __DIR__ . '/data/messages.txt');
function readMessagesFromFile() 
{
	$messages = [];
	(file_exists(DATA_FILE)) ? $messages = unserialize(file_get_contents(DATA_FILE)) : $messages = '';
	return $messages;
}
function saveMessageToFile($message) 
{
	$message = json_decode($message, true);
	$message['time'] = date("d.m.y, G:i:s");
	$messages = readMessagesFromFile();
	$messages[] = $message;
	return file_put_contents(DATA_FILE, serialize($messages)) !== false;

}
function sendMessages($messages) 
{
	header('Content-Type: application/json');
	echo json_encode($messages);
}
?>