<?php
/**
 * Part of code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace {{tmpl.cap}}Template\Task;

use {{tmpl.cap}}Template\Action;
use {{project.class}}\Controller\AbstractTaskController;
use Windwalker\String\String;

/**
 * Convert Task Controller
 */
class Convert extends AbstractTaskController
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
		// Flip replace string and path because we are converting code back to template.

		// Flip src & dest
		$dest = $this->config['path.src'];
		$src  = $this->config['path.dest'];

		$this->config['path.src']  = $src;
		$this->config['path.dest'] = $dest;

		// Flip replace array
		$this->replace = array_flip($this->replace);

		// Quote by tag variable
		foreach ($this->replace as &$replace)
		{
			$replace = String::quote($replace, $this->config['tag.variable']);
		}

		// Do it now.
		$this->doAction(new Action\ConvertAction);
	}
}
