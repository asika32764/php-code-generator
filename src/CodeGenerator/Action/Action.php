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
	 * @param array          $replace
	 *
	 * @return  void
	 */
	abstract public function execute(TaskController $controller, $replace = array());
}
