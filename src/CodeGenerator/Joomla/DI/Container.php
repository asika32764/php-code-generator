<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla\DI;

use CodeGenerator\DI\ContainerInterface;
use Joomla\DI\Container as JoomlaContainer;

/**
 * Class Container
 *
 * @since 1.0
 */
class Container implements ContainerInterface
{
	/**
	 * Property instance.
	 *
	 * @var JoomlaContainer
	 */
	protected static $instance;
	/**
	 * Property jContainer.
	 *
	 * @var  null
	 */
	protected $jContainer;

	/**
	 * Constructor.
	 *
	 * @param JoomlaContainer $jContainer
	 */
	public function __construct($jContainer = null)
	{
		$this->jContainer = $jContainer ? : new JoomlaContainer;
	}

	/**
	 * getInstance
	 *
	 * @return JoomlaContainer
	 */
	public static function getInstance()
	{
		if (!(self::$instance instanceof Container))
		{
			self::$instance = new static;
		}

		return self::$instance;
	}

	/**
	 * Convenience method for creating singleton keys.
	 *
	 * @param   string   $key      Name of dataStore key to set.
	 * @param   callable $callback Callable function to run when requesting the specified $key.
	 *
	 * @return  ContainerInterface  This object for chaining.
	 */
	public function singleton($key, $callback)
	{
		$this->jContainer->share($key, $callback);

		return $this;
	}

	/**
	 * Method to retrieve the results of running the $callback for the specified $key;
	 *
	 * @param   string  $key      Name of the dataStore key to get.
	 * @param   boolean $forceNew True to force creation and return of a new instance.
	 *
	 * @return  mixed   Results of running the $callback for the specified $key.
	 */
	public function get($key, $forceNew = false)
	{
		return $this->jContainer->get($key, $forceNew);
	}

	/**
	 * Method to set the key and callback to the dataStore array.
	 *
	 * @param   string  $key       Name of dataStore key to set.
	 * @param   mixed   $value     Callable function to run or string to retrive when requesting the specified $key.
	 * @param   boolean $singleton True to create and store a shared instance.
	 *
	 * @return  ContainerInterface  This object for chaining.
	 */
	public function set($key, $value, $singleton = false)
	{
		$this->jContainer->set($key, $value, $singleton);

		return $this;
	}

	/**
	 * Register a service provider to the container.
	 *
	 * @param   object  $provider  The service provider to register.w
	 *
	 * @return  Container  This object for chaining.
	 */
	public function registerServiceProvider($provider)
	{
		$provider->register($this->jContainer);

		return $this;
	}
}
