<?php
class a
{
	static public function tt()
	{
		$c = get_called_class();
		echo $c::bb();
	}
}

class ab extends a
{
	static public function bb()
	{
		return "ll";
	}
}
	
	$f = new a();
	$f -> tt();
?>