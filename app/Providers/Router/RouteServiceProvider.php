<?php

namespace App\Providers\Router;

class RouteServiceProvider
{
	/**
	 * @var routes
	 */
	public $routes;

	/**
	 * @var url
	 */
	public $url;

	/**
	 * @var method
	 */
	public $method;

	public function __construct($routes)
	{
		$this->routes = $routes;
		$this->url = $_SERVER['REQUEST_URI'];
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->handle();
	}

	/**
	 * Handle
	 */
	public function handle()
	{
		$route = $this->findRoute();

		// Page not found
		if ($route == '404') {
			header("HTTP/1.0 404 Not Found");
			return view('errors.404');
		}

		$controller = $route['action'][0];
		$method = $route['action'][1];
		$object = new $controller;

		if (!method_exists($object, $method)) {
			throw new \Exception("$method Method not found in $controller");
		}

		$object->$method();
	}

	/**
	 * Find Routes
	 * 
	 * @return array
	 */
	public function findRoute()
	{
		$route = array_values(array_filter($this->routes, function($route) {
		    return isset($route['url']) && $route['url'] === $this->url;
		}));

		return isset($route[0]) ? $route[0] : '404';
	}
}
