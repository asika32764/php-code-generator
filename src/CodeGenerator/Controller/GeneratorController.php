<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\DI\Container;

/**
 * Class GeneratorController
 *
 * @since 1.0
 */
class GeneratorController extends Controller
{
	/**
	 * Property task.
	 *
	 * @var string
	 */
	protected $task;

	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @since   12.1
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		$template = $this->io->getArgument(0) ? : exit('Please give me a template name.');

		$this->config['template'] = $template;

		// Get Handler
		$task = array_map('ucfirst', explode('.', $this->getTask()));
		$task = implode('\\', $task);

		$class = ucfirst($template) . 'Template\\Task\\' . ucfirst($task);

		if (!class_exists($class))
		{
			throw new \RuntimeException(sprintf('Task "%s" not support.', $this->getTask()));
		}

		$controller = new $class($this->io, $this->config);

		$controller->execute();

		$this->out()->out('Template generated.');
	}

	/**
	 * getTask
	 *
	 * @return  string
	 */
	public function getTask()
	{
		return $this->task;
	}

	/**
	 * setTask
	 *
	 * @param   string $task
	 *
	 * @return  GeneratorController  Return self to support chaining.
	 */
	public function setTask($task)
	{
		$this->task = $task;

		return $this;
	}
}
