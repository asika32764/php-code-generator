<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Action;

use CodeGenerator\Controller\TaskController;
use CodeGenerator\IO\IOInterface;

/**
 * Class Action
 *
 * @since 1.0
 */
abstract class Action
{
	/**
	 * Property controller.
	 *
	 * @var TaskController
	 */
	protected $controller;

	/**
	 * Property replace.
	 *
	 * @var array
	 */
	protected $replace;

	/**
	 * Property config.
	 *
	 * @var \Joomla\Registry\Registry
	 */
	protected $config;

	/**
	 * Property io.
	 *
	 * @var IOInterface
	 */
	protected $io;

	/**
	 * execute
	 *
	 * @param TaskController $controller
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
	 * doExecute
	 *
	 * @return  mixed
	 */
	abstract protected function doExecute();
}
