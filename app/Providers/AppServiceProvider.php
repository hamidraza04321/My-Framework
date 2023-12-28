<?php

namespace App\Providers;

class AppServiceProvider
{
	public function __construct()
	{
		$this->errorHandling();
		$this->handle();
	}

	/**
	 * Error Handling
	 * 
	 * @return void
	 */
	public function errorHandling()
	{
		set_exception_handler([new \App\Exception\DefaultException, 'handle']);
		set_error_handler([ new \App\Exception\DefaultException, 'handle' ]);
	}

	/**
	 * Handle to run app
	 * 
	 * @return void
	 */
	public function handle()
	{
		require_once dirname(__DIR__) . '/../routes/web.php';
	}
}