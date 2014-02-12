<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla\Provider;

use CodeGenerator\Joomla\Application;
use CodeGenerator\Joomla\IO;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Registry\Registry;

/**
 * Class ServiceProvider
 *
 * @since 1.0
 */
class ServiceProvider implements ServiceProviderInterface
{
	/**
	 * Property config.
	 *
	 * @var  array
	 */
	protected $config;

	/**
	 * Constructor.
	 *
	 * @param array $config
	 */
	public function __construct($config = array())
	{
		$this->config = $config;
	}

	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  Container  Returns itself to support chaining.
	 *
	 * @since   1.0
	 */
	public function register(Container $container)
	{
		// IO
		$container->alias('io', 'CodeGenerator\\Joomla\\IO')
			->alias('CodeGenerator\\IO\\IOInterface', 'CodeGenerator\\Joomla\\IO')
			->share('CodeGenerator\\Joomla\\IO', new IO);

		// Operators
		$operators = array(
			'copy',
			'convert',
			'replace'
		);

		foreach ($operators as $operator)
		{
			$class = '\\CodeGenerator\\FileOperator\\' . ucfirst($operator) . 'Operator';

			$container->alias('operator.' . $operator, $class)
				->buildSharedObject($class);
		}

		// App
		$config = $this->config;

		$container->alias('app', 'CodeGenerator\\Joomla\\Application')
			->share(
				'CodeGenerator\\Joomla\\Application',
				function($container) use ($config)
				{
					return new Application($container, new Registry($config));
				}
			);
	}
}
