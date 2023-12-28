<?php

namespace App\Providers;

use App\Providers\FileContentProvider;

class CommandServiceProvider
{
	/**
	 * @var $commands
	 */
	protected array $commands = [
		'serve',
		'make:controller',
		'make:model',
		'make:migration',
		'help'
	];

	/**
	 * @var $paths
	 */
	protected array $paths = [
		'controller' => '/Http/Controller',
		'model' => '/Models',
		'migration' => '/database/migrations'
	];

	/**
	 * @var $arguments
	 */
	protected array $arguments;

	/**
	 * @var $filesContent
	 */
	protected $filesContent;

	/**
	 * Generate command
	 * 
	 * @param $arguments  array
	 */
	function __construct($arguments)
	{
		unset($arguments[0]); // Remove artisan name

		$this->arguments = array_values($arguments);
		$this->filesContent = new FileContentProvider;
		$this->handle();
	}

	/**
	 * Handel Command
	 * 
	 * @return void
	 */
	public function handle()
	{
		$this->checkForCommandGuides();
		$this->checkForInvalidCommand();
		$this->launchComand();
	}

	/**
	 * Command guides
	 * 
	 * @return void
	 */
	public function checkForCommandGuides()
	{
		if (empty($this->arguments) || $this->arguments[0] == 'help') {
			echo PHP_EOL;
			echo "    \033[32m serve \033[0m		" . " Start development server." . PHP_EOL;
			echo "    \033[32m make:controller \033[0m	" . " this command make the controller." . PHP_EOL;
			echo "    \033[32m make:model \033[0m	" . " this command make the model." . PHP_EOL;
			echo "    \033[32m make:migration \033[0m	" . " this command makes the migration." . PHP_EOL;
			echo "    \033[32m help \033[0m		" . " Commands guides";
			echo PHP_EOL;
		}
	}

	/**
	 * Check for invalid command
	 * 
	 * @return void
	 */
	public function checkForInvalidCommand()
	{
		if (isset($this->arguments[0]) && !in_array($this->arguments[0], $this->commands)) {
			echo PHP_EOL;
			echo "\033[32m Info:\033[0m Command not found !";
			echo PHP_EOL;
			die();
		}
	}

	/** 
	 * Launch Command
	 * 
	 * @return void
	 */
	public function launchComand()
	{
		if (isset($this->arguments[0]) && $this->arguments[0] != 'help') {
			$seprator = explode(':', $this->arguments[0]);
			$action = $seprator[0];
			$make = isset($seprator[1]) ? $seprator[1] : null;
			$this->$action($make);
		}
	}

	/**
	 * Development Server
	 * 
	 * @return void
	 */
	public function serve()
	{
		echo PHP_EOL;
		echo "\033[32m Starting Server... \033[0m" . PHP_EOL;
		shell_exec('cd public && php -S localhost:8000');
	}

	/**
	 * Make file
	 * 
	 * @return void
	 */
	public function make($file)
	{
		if (!isset($this->arguments[1])) {
			echo PHP_EOL;
			echo "  File name is missing !";
			echo PHP_EOL;
			return;
		}

		switch ($file) {
			case 'controller':
				$file_directory = dirname(__DIR__) . $this->paths[$file] . '/' . ucwords($this->arguments[1]) . '.php';
				
				if (file_exists($file_directory)) {
					echo PHP_EOL . "\033[32m    Info:\033[0m " . ucwords($this->arguments[1]) . " has already exists !" . PHP_EOL;
					break;
				}

				if (file_put_contents($file_directory, $this->filesContent->controller($this->arguments[1]))) {
					echo PHP_EOL . "\033[32m    Info:\033[0m Controller Created Successfully !" . PHP_EOL;
				}
				break;
			case 'model':
				$file_directory = dirname(__DIR__) . $this->paths[$file] . '/' . ucwords($this->arguments[1]) . '.php';
				
				if (file_exists($file_directory)) {
					echo PHP_EOL . "\033[32m    Info:\033[0m " . ucwords($this->arguments[1]) . " Model Has already exists !" . PHP_EOL;
					break;
				}

				if (file_put_contents($file_directory, $this->filesContent->model($this->arguments[1]))) {
					echo PHP_EOL . "\033[32m    Info:\033[0m Model Created Successfully !" . PHP_EOL;
				}
				break;
		}
	}
}