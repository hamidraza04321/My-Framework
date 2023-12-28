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
		$fileNameLowercase = strtolower($fileName) . 's';

		return <<<Content
		<?php

		namespace App\Models;

		class {$fileName}
		{
			protected \$table = "$fileNameLowercase";
			protected \$fillable = [];
			protected \$guarded = [ 'id', 'created_at', 'updated_at' ];
		}
		Content;
	}
}