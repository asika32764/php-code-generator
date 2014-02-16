<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace TemplateTemplate\Action;

use CodeGenerator\Action\Action;
use CodeGenerator\FileOperator\ConvertOperator;
use CodeGenerator\Filesystem\Folder;

/**
 * Class ConvertAction
 *
 * @since 1.0
 */
class ConvertAction extends Action
{
	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$convertOperator = new ConvertOperator($this->io);

		// Delete old folder first.
		Folder::delete($this->config['path.dest']);

		// Do convert.
		$convertOperator->copy($this->config['path.src'], $this->config['path.dest'], $this->replace);
	}
}
