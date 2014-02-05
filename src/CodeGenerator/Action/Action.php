<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Action;

use CodeGenerator\Controller\TaskController;
use CodeGenerator\DI\Container;

/**
 * Class Action
 *
 * @since 1.0
 */
abstract class Action
{
	/**
	 * Property container.
	 *
	 * @var  \Joomla\DI\Container
	 */
	protected $container;

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
	 * Contructor.
	 *
	 * @param Container $container
	 */
	public function __construct(Container $container = null)
	{
		$this->container = $container ? : Container::getInstance();
	}

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

		return $this->doExecute();
	}

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	abstract protected function doExecute();
}
