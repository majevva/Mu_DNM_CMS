<?php


class File implements Session
{
	static protected $filename;

	public function toJson()
	{
		return 0;
	}

	public function __toString()
	{
		return 0;
	}

	public function read($filename)
	{
		
	}

	public function write($filename)
	{
		
	}

	static public function load($options)
	{
		return 0;
	}

	public function save()
	{
		
	}

	public function has($key)
	{
		return 0;
	}

	public function get($key)
	{
		return 0;
	}

	public function set($key, $value)
	{
		
	}
}

require SYSTEM_PATH . DS . 'Scheduler' . DS . 'Contracts' . DS . 'Session.php';

?> 
