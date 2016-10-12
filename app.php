<?php
namespace PhpChat\App;
require 'functions.php';
use PhpChat\Functions as Functions;
if (isset($_POST['str'])) {
	Functions\saveMessageToFile($_POST['str']);
} 
else {
	$messages = Functions\readMessagesFromFile();
	Functions\sendMessages($messages);
}
?>