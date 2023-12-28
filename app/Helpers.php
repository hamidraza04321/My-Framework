<?php

/**
 * Rendering View
 *
 * @param $path  string
 * @param $parameters  array
 * 
 * @return void
 */
function view($path, $parameters = null)
{
	if ($parameters) {
		extract($parameters);
	}

    $file = __DIR__ . '/../resources/' . str_replace('.', '/', $path) . '.php';

    if (!file_exists($file)) {
        throw new Exception('View not found');
    }

    include $file;
}