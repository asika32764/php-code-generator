<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\Action\Action;
use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Base controller of task.
 */
abstract class TaskController extends Controller
{
	/**
	 * Property config.
	 *
	 * @var Registry
	 */
	public $config = null;

	/**
	 * Property replace.
	 *
	 * @var  array
	 */
	public $replace = array();

	/**
	 * Constructor.
	 *
	 * @param IOInterface $io      IO adapter.
	 * @param Registry    $config  Config.
	 * @param array       $replace Replacing string array.
	 */
	public function __construct(IOInterface $io, Registry $config = null, $replace = array())
	{
		$this->replace = $replace;

		parent::__construct($io, $config);
	}

	/**
	 * Do an action by action class.
	 *
	 * @param Action $action Action class.
	 *
	 * @return  TaskController  Return self to support chaining.
	 */
	public function doAction(Action $action)
	{
		$action->execute($this);

		return $this;
	}

	/**
	 * Get config.
	 *
	 * @param string $key     Config key.
	 * @param string $default Default value if not exists.
	 *
	 * @return  mixed
	 */
	public function get($key, $default)
	{
		return $this->config->get($key, $default);
	}

	/**
	 * Set config.
	 *
	 * @param string $key   Config key.
	 * @param string $value Value you want to set.
	 *
	 * @return  TaskController  Return self to support chaining.
	 */
	public function set($key, $value)
	{
		$this->config->set($key, $value);

		return $this;
	}

	/**
	 * Get config object.
	 *
	 * @return  Registry Config object.
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * Set config object
	 *
	 * @param   Registry $config Config object.
	 *
	 * @return  TaskController  Return self to support chaining.
	 */
	public function setConfig($config)
	{
		$this->config = $config;

		return $this;
	}
}
