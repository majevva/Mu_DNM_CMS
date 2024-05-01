<?php


class Tasker
{
	protected $jobsPath;
	protected $session;
	protected $jobs;
	protected $presets = array('yearly' => '0 0 1 1 *', 'annually' => '0 0 1 1 *', 'monthly' => '0 0 1 * *', 'weekly' => '0 0 * * 0', 'daily' => '0 0 * * *', 'hourly' => '0 * * * *');
	protected $task_name;

	public function __construct()
	{
		
	}

	public function job($name, Closure $task)
	{
		return 0;
	}

	public function start()
	{
		return 0;
	}

	private function executeJob($index)
	{
		
	}

	private function onSchedule(Job $job)
	{
		return 0;
	}

	private function isDue(Job $job)
	{
		return 0;
	}

	private function parseExpr($expr)
	{
		return 0;
	}

	private function preset($name, $expr)
	{
		
	}

	private function parseTimestamp($time)
	{
        return 0;
	}

	private function log(Job $job)
	{
		
	}

	private function lock(Job $job)
	{
		
	}

	private function check_lock(Job $job)
	{
		return 0;
	}

	private function lapsedTimeToMinutes(Job $job)
	{
		return 0;
	}

	private function timeToDay(Job $job)
	{
		return 0;
	}

	private function timeToMonth(Job $job)
	{
		return 0;
	}

	private function timeToWeek(Job $job)
	{
		return 0;
	}
}

require SYSTEM_PATH . DS . 'Scheduler' . DS . 'Task.php';
require SYSTEM_PATH . DS . 'Scheduler' . DS . 'Base' . DS . 'Job.php';

?> 
