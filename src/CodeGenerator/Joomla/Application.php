<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla;

use CodeGenerator\Application\ApplicationInterface;
use Joomla\Console\Console;
use Joomla\DI\Container;
use Joomla\Input;
use Joomla\Registry\Registry;

/**
 * Class Application
 *
 * @since 1.0
 */
class Application extends Console implements ApplicationInterface
{
	/**
	 * Property io.
	 *
	 * @var  IO
	 */
	protected $io = null;

	/**
	 * Property container.
	 *
	 * @var  null
	 */
	protected $container = null;

	/**
	 * Constructor.
	 *
	 * @param Container $container
	 */
	public function __construct(Container $container)
	{
		$this->io = $container->get('io');
		$input    = $this->io->getInput();
		$output   = $this->io->getOutput();
		$config   = $container->get('config');

		$this->container = $container;

		// Set basic dir.
		$config['basic_dir.base'] = realpath(dirname(__DIR__) . '/../../..');

		$config['basic_dir.dest'] = $this->io->getOption('p', $config['basic_dir.base'] . '/dest');

		$config['basic_dir.src'] = $config['basic_dir.base'] . '/template';

		parent::__construct($input, $config, $output);
	}

	/**
	 * getIo
	 *
	 * @return  \CodeGenerator\Joomla\IO
	 */
	public function getIO()
	{
		return $this->io;
	}

	/**
	 * setIo
	 *
	 * @param   \CodeGenerator\Joomla\IO $io
	 *
	 * @return  Application  Return self to support chaining.
	 */
	public function setIO($io)
	{
		$this->io     = $io;
		$this->input  = $this->io->getInput();
		$this->output = $this->io->getOutput();

		return $this;
	}
}
 