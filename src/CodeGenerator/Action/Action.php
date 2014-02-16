<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Action;

use CodeGenerator\Controller\TaskController;
use CodeGenerator\IO\IOInterface;

/**
 * A Base Action class.
 *
 * @since 1.0
 */
abstract class Action
{
	/**
	 * Task controller.
	 *
	 * @var TaskController
	 */
	protected $controller;

	/**
	 * Array of replacing string.
	 *
	 * @var array
	 */
	protected $replace;

	/**
	 * Config.
	 *
	 * @var \Joomla\Registry\Registry
	 */
	protected $config;

	/**
	 * IO Adapter.
	 *
	 * @var IOInterface
	 */
	protected $io;

	/**
	 * Execute this action.
	 *
	 * @param TaskController $controller  Task controller.
	 *
	 * @return  mixed
	 */
	public function execute(TaskController $controller)
	{
		$this->controller = $controller;

		$this->replace = $controller->replace;

		$this->config = $controller->config;

		$this->io = $controller->io;

		return $this->doExecute();
	}

	/**
	 * Do this execute.
	 *
	 * @return  mixed
	 */
	abstract protected function doExecute();
}
