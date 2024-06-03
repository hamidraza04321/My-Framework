<?php

namespace App\Providers;

class FileContentProvider
{
	/**
	 * Controller
	 * 
	 * @param $fileName string
	 */
	public function controller($fileName)
	{
		return <<<Content
		<?php

		namespace App\Http\Controller;

		class {$fileName}
		{
			function __construct()
			{
				//..
			}
		}
		Content;
	}

	/**
	 * Model
	 * 
	 * @param $fileName string
	 */
	public function model($fileName)
	{
		// $fileNameLowercase = strtolower($fileName) . 's';

		return <<<Content
		<?php

		namespace App\Models;

		use App\Providers\ModelServiceProvider as Model;

		class $fileName extends Model
		{
			//
		}
		Content;
	}
}