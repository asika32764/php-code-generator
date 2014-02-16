<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Template;

use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Class Template
 *
 * @since 1.0
 */
abstract class Template
{
	/**
	 * Property io.
	 *
	 * @var IOInterface
	 */
	protected $io;
	/**
	 * Property config.
	 *
	 * @var  array
	 */
	protected $config;

	/**
	 * Property task.
	 *
	 * @var string
	 */
	protected $task;

	/**
	 * Constructor.
	 *
	 * @param IOInterface $io
	 * @param array       $config
	 */
	public function __construct($io, $config = array())
	{
		$this->io = $io;
		$this->config = $config;
	}

	/**
	 * execute
	 *
	 * @return  mixed
	 *
	 * @throws \RuntimeException
	 */
	public function execute()
	{
		$task = array_map('ucfirst', explode('.', $this->getTask()));
		$task = implode('\\', $task);

		$ref = new \ReflectionClass($this);
		$namespace = $ref->getNamespaceName();

		$class = $namespace . '\\Task\\' . ucfirst($task);

		if (!class_exists($class))
		{
			throw new \RuntimeException(sprintf('Task "%s" not support.', $this->getTask()));
		}

		$this->config = $this->registerConfig($this->io, $this->config);

		$replace = $this->registerReplaces($this->io, array());

		/** @var \CodeGenerator\Controller\TaskController $controller */
		$controller = new $class($this->io, $this->config, $replace);

		try
		{
			$controller->execute();
		}
		catch (\Exception $e)
		{
			$this->io->out($e->getMessage());

			return false;
		}
	}

	/**
	 * registerConfig
	 *
	 * @param IOInterface    $io
	 * @param array|Registry $config
	 *
	 * @return  array
	 */
	abstract protected function registerConfig($io, $config);

	/**
	 * registerReplaces
	 *
	 * @param IOInterface $io
	 * @param array       $replace
	 *
	 * @return  array
	 */
	abstract protected function registerReplaces($io, $replace);

	/**
	 * getTask
	 *
	 * @return  string
	 */
	public function getTask()
	{
		return $this->task;
	}

	/**
	 * setTask
	 *
	 * @param   string $task
	 *
	 * @return  Template  Return self to support chaining.
	 */
	public function setTask($task)
	{
		$this->task = $task;

		return $this;
	}
}
 