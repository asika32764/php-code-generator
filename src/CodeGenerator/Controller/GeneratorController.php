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
use CodeGenerator\Provider\ServiceProvider;

use Joomla\DI\ContainerAwareInterface;
use Joomla\DI\Container as JoomlaContainer;

/**
 * Class GeneratorController
 *
 * @since 1.0
 */
class GeneratorController extends Controller implements ContainerAwareInterface
{
	/**
	 * Property container.
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Instantiate the controller.
	 *
	 * @param   \Joomla\DI\Container $container  DI Container.
	 * @param   IOInterface          $io         The Controller object.
	 */
	public function __construct(JoomlaContainer $container = null, IOInterface $io = null)
	{
		$this->container = $container ? : $this->getContainer();

		// Set provider
		$container->registerServiceProvider(new ServiceProvider);

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
	}

	/**
	 * Get the DI container.
	 *
	 * @return  Container
	 *
	 * @since   1.0
	 * @throws  \UnexpectedValueException May be thrown if the container has not been set.
	 */
	public function getContainer()
	{
		if (!$this->container)
		{
			$this->container = Container::getInstance();
		}

		return $this->container;
	}

	/**
	 * Set the DI container.
	 *
	 * @param   JoomlaContainer $container The DI container.
	 *
	 * @return  $this
	 *
	 * @since   1.0
	 */
	public function setContainer(JoomlaContainer $container)
	{
		$this->container = $container;

		return $this;
	}
}
