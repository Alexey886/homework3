<?php
namespace PhpChat\classes;
require_once 'message.php';

class Admin_message extends Messag
{
	public function getName()
	{
		return '<img src = "Resourses/img/chat.png"><b class = "admin_name">'. $this -> name. '</b>';
	}
	public function getText()
	{
		return '<ins>'. $this -> text. '</ins>';
	}
}
?>