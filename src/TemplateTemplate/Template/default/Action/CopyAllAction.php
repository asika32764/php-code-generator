<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace {{tmpl.cap}}Template\Action;

use {{project.class}}\Action\Action;
use {{project.class}}\FileOperator\CopyOperator;

/**
 * CopyAllAction
 */
class CopyAllAction extends Action
{
	/**
	 * Execute this action.
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$copyOperator = new CopyOperator($this->io, (array) $this->config['tag.variable']);

		$copyOperator->copy($this->config['path.src'], $this->config['path.dest'], $this->config['replace']);
	}
}
