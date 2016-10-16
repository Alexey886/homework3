<?php

namespace PhpChat\classes;
use \PHPChat\Functions as Functions;



class Messag implements \PhpChat\interfaces\IMessage
{
	public $name = null;
	public $text = null;
	public $time = null;
	private $errors = [];

	public function __construct($message)
	{
		$message = json_decode($message, true);
		$this -> name = $message['usr'];
		$this -> text = $message['msg'];
		$this -> time = date("d.m.y, G:i:s");
		
	} 
	
	public function getName()
	{
		return $this -> name;
	}
	
	public function getText()
	{
		return $this -> text;
	}
	
	public function validate()
	{
		if(empty($this -> name))
		{
			$this -> errors['name'] = "Не заполнено имя";
			$this -> errors['text'] = "Не введен текст";
		}
			
	}
	
	public function save()
	{
		$message = [
			'usr' => $this -> getName(),
			'msg' => $this -> getText(),
			'time' => $this -> time
		];
		
		
		$messages = $this -> read();
		$messages[] = $message;
		return file_put_contents(__DIR__ . '/data/messages.txt', serialize($messages)) !== false;
	}
	
		public function read()
	{
		$messages = [];
		(file_exists(__DIR__ . '/data/messages.txt')) ? $messages = unserialize(file_get_contents(__DIR__ . '/data/messages.txt')) : $messages = '';
		return $messages;
	}
	
	public function getErrors()
	{
		return $this -> errors;
	}
	
	public function toArray()
	{
		return [
			'name' => $this -> name,
			'text' => $this -> text,
			'time' => $this -> time
		];
	}
}

class Admin_message extends Messag
{
	public function getName()
	{
		return '++'. $this -> name. '++';
	}
}



?>