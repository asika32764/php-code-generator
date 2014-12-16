<?php
/**
 * Part of generator project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace CodeGenerator\Action;

use CodeGenerator\Controller\AbstractTaskController;
use CodeGenerator\IO\IOInterface;

/**
 * The AbstractAction class.
 * 
 * @since  {DEPLOY_VERSION}
 */
abstract class AbstractAction
{
	/**
	 * Task controller.
	 *
	 * @var AbstractTaskController
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
	 * @var \Windwalker\Registry\Registry
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
	 * @param AbstractTaskController $controller  Task controller.
	 *
	 * @return  mixed
	 */
	public function execute(AbstractTaskController $controller)
	{
		$this->controller = $controller;
		$this->replace    = $controller->replace;
		$this->config     = $controller->config;
		$this->io         = $controller->io;

		return $this->doExecute();
	}

	/**
	 * Do this execute.
	 *
	 * @return  mixed
	 */
	abstract protected function doExecute();
}
