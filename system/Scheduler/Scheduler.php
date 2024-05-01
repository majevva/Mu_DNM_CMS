<?php

class Scheduler
{
	protected $jobsPath;

	public function __construct($settings)
	{
		
	}
}

require SYSTEM_PATH . DS . 'Scheduler' . DS . 'Base' . DS . 'Tasker.php';
require SYSTEM_PATH . DS . 'Scheduler' . DS . 'Session' . DS . 'File.php';

?> 
