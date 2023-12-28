<?php

namespace App\Exception;

class DefaultException
{
	/**
	 * Exception Handling
	 */
	public function handle($message)
	{
		include __DIR__ . '/../../resources/errors/exception.php';
	}
}
