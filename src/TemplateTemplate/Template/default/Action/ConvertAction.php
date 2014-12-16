<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace {{tmpl.cap}}Template\Action;

use {{project.class}}\Action\AbstractAction;
use {{project.class}}\FileOperator\ConvertOperator;

/**
 * ConvertAction
 */
class ConvertAction extends AbstractAction
{
	/**
	 * Execute this action.
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$convertOperator = new ConvertOperator($this->io);

		$convertOperator->copy($this->config['path.src'], $this->config['path.dest'], $this->replace);
	}
}
