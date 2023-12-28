<?php

namespace App\Providers\Router;

class RoutesCollection
{
	/**
	 * @var HTTP_VERBS array
	 * @property protected
	 */
	protected $verbs = [ 'GET', 'POST', 'PUT', 'PATCH', 'UPDATE', 'DELETE' ];

	/**
	 * @var $routes array
	 * @property protected
	 */
	protected static $routes = [];

	/**
	 * Static method get
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function get($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'GET',
			'action' => $action
		];
	}

	/**
	 * Static method post
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function post($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'POST',
			'action' => $action
		];
	}

	/**
	 * Static method put
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function put($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'PUT',
			'action' => $action
		];
	}

	/**
	 * Static method patch
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function patch($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'PATCH',
			'action' => $action
		];
	}

	/**
	 * Static method delete
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function delete($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'DELETE',
			'action' => $action
		];
	}

	/**
	 * Static method update
	 * 
	 * @param $url  string
	 * @param $action
	 */
	public static function update($url, $action)
	{
		self::$routes[] = [
			'url' => $url,
			'method' => 'UPDATE',
			'action' => $action
		];
	}

	/**
	 * Get Routes
	 * 
	 * @return array
	 */
	public static function collection()
	{
		return self::$routes;
	}
}