<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace AcmeTemplate\Action;

use CodeGenerator\Action\Action;
use CodeGenerator\FileOperator\CopyOperator;

/**
 * Class CopyAllAction
 *
 * @since 1.0
 */
class CopyAllAction extends Action
{
	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$copyOperator = new CopyOperator($this->io);

		$copyOperator->copy($this->config['path.src'], $this->config['path.dest'], $this->replace);
	}
}
