<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\DI\Container;
use CodeGenerator\IO\IOInterface;

/**
 * Class GeneratorController
 *
 * @since 1.0
 */
class GeneratorController extends Controller
{
	/**
	 * Property container.
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Property task.
	 *
	 * @var string
	 */
	protected $task;

	/**
	 * Instantiate the controller.
	 *
	 * @param   IOInterface          $io         The Controller object.
	 */
	public function __construct(IOInterface $io = null)
	{
		parent::__construct($io);
	}

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
		$task = $this->getTask();


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
