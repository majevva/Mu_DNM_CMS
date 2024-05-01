<?php


class Task
{
	const DAILY = 0;
	const MIN1 = 1;
	const MIN5 = 2;
	const MIN10 = 3;
	const MIN30 = 4;
	const MIN60 = 5;
	const MIN720 = 6;
	const MONTHLY = 7;
	const WEEKLY = 8;
	const CUSTOM = 9;
	const NOW = -1;

	protected $interval;
	protected $present;

	public function daily()
	{
		return 0;
	}

	public function weekly()
	{
		return 0;
	}

	public function monthly()
	{
		return 0;
	}

	public function everyMinute()
	{
		return 0;
	}

	public function everyFiveMinutes()
	{
		return 0;
	}

	public function everyTenMinutes()
	{
		return 0;
	}

	public function everyHalfHour()
	{
		return 0;
	}

	public function everyHour()
	{
		return 0;
	}

	public function everyTwelveHours()
	{
		return 0;
	}

	public function now()
	{
		return 0;
	}

	public function custom($present = '')
	{
		return 0;
	}

	public function __get($property)
	{
		return 0;
	}
}


?> 
