<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\Action\Action;
use CodeGenerator\IO\IOInterface;
use CodeGenerator\Provider\ServiceProvider;
use Joomla\Registry\Registry;
use Joomla\DI\Container;

/**
 * Class TaskController
 *
 * @since 1.0
 */
abstract class TaskController extends Controller
{
	/**
	 * Property config.
	 *
	 * @var Registry
	 */
	public $config;

	/**
	 * Property replace.
	 *
	 * @var  array
	 */
	public $replace = array();

	/**
	 * Constructor
	 *
	 * @param Container   $container
	 * @param IOInterface $io
	 * @param Registry    $config
	 */
	public function __construct(Container $container, IOInterface $io, Registry $config = null)
	{
		$this->config = $config ? : new Registry($config);
		$this->container = $container;

		// Set basic dir.
		$config->set('basic_dir.dest', JPATH_BASE);

		$config->set('basic_dir.src', dirname(__DIR__) . '/Template');

		parent::__construct($io);
	}

	/**
	 * doAction
	 *
	 * @param Action $action
	 *
	 * @return  $this
	 */
	public function doAction(Action $action)
	{
		$action->execute($this, $this->replace);

		return $this;
	}

	/**
	 * get
	 *
	 * @param string $key
	 * @param string $default
	 *
	 * @return  mixed
	 */
	public function get($key, $default)
	{
		return $this->config->get($key, $default);
	}

	/**
	 * set
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return  TaskController
	 */
	public function set($key, $value)
	{
		$this->config->set($key, $value);

		return $this;
	}

	/**
	 * getConfig
	 *
	 * @return  Registry
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * setConfig
	 *
	 * @param   Registry $config
	 *
	 * @return  TaskController  Return self to support chaining.
	 */
	public function setConfig($config)
	{
		$this->config = $config;

		return $this;
	}
}
