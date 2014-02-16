<?php
/**
 * Part of code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace {{tmpl.cap}}Template\Task;

use {{tmpl.cap}}Template\Action;
use {{project.class}}\Controller\TaskController;

/**
 * Generate Task Controller
 */
class Generate extends TaskController
{
	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		$this->doAction(new Action\CopyAllAction);
	}
}
