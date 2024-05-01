<?php

interface Session
{
	static public function load($options);

	public function save();

	public function set($key, $value);

	public function get($key);

	public function has($key);
}


?> 
