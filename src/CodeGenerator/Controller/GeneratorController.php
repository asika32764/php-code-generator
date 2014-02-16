<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

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
	 * Property templatePrefix.
	 *
	 * @var  string
	 */
	protected $templateName = '%sTemplate\\%sTemplate';

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
		$template = $this->io->getArgument(0) ? : exit("Please give me a template name.\n");

		$this->config['template'] = $template;

		// Get Template Handler
		$class = sprintf($this->templateName, ucfirst($template), ucfirst($template));

		if (!class_exists($class))
		{
			throw new \LogicException(sprintf('Template "%s" not found.', $template));
		}

		/** @var $template \CodeGenerator\Template\Template */
		$template = new $class($this->io, $this->config);

		if ($template->setTask($this->getTask())->execute())
		{
			$this->out()->out('Template generated.');

			return true;
		}
		else
		{
			return false;
		}
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
