<?php
namespace PhpChat\interfaces;

interface IMessage
{
	public function getName();
	public function getText();
	public function validate();
	public function save();
	public function getErrors();
	public function toArray();
}
?>