<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla;

use CodeGenerator\Application\ApplicationInterface;
use CodeGenerator\IO\IOInterface;
use CodeGenerator\Joomla\Command\Generate\Generate;
use CodeGenerator\Joomla\Command\Template\Template;
use Joomla\Application\Cli\CliOutput;
use Joomla\Console\Console;
use Joomla\Console\Option\Option;
use Joomla\DI\Container;
use Joomla\Input;
use Joomla\Registry\Registry;

/**
 * Class Application
 *
 * @since 1.0
 */
class Application extends Console
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
	 * @param Input\Cli $input
	 * @param Registry  $config
	 * @param CliOutput $output
	 */
	public function __construct(Input\Cli $input = null, Registry $config = null, CliOutput $output = null)
	{
		parent::__construct($input, $config, $output);

		$this->registerCommands();

		$this->rootCommand->addOption(
				array('p', 'path'),
				'',
				'Dest path.',
				Option::IS_GLOBAL
			)->addOption(
				array('t'),
				'default',
				'Sub template name.',
				Option::IS_GLOBAL
			);

		// Set basic dir.
		define('GENERATOR_PATH', $config['basic_dir.base'] ? : realpath(dirname(__DIR__) . '/../..'));
		define('JPATH_ROOT', GENERATOR_PATH);

		// $config['basic_dir.dest'] = $this->rootCommand->getOption('p', $config['basic_dir.base'] . '/dest');

		// $config['basic_dir.src']  = $config['basic_dir.base'] . '/template';
	}

	/**
	 * registerCommands
	 *
	 * @return  void
	 */
	protected function registerCommands()
	{
		$this->addCommand(new Template);
		$this->addCommand(new Generate);
	}
}
