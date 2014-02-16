<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla;

use CodeGenerator\Joomla\Command;
use Joomla\Application\Cli\CliOutput;
use Joomla\Console\Console;
use Joomla\Console\Option\Option;
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
	 * The Console title.
	 *
	 * @var  string
	 *
	 * @since  1.0
	 */
	protected $name = 'PHP Code Generator';

	/**
	 * Version of this application.
	 *
	 * @var string
	 *
	 * @since  1.0
	 */
	protected $version = '1.0';

	/**
	 * Console description.
	 *
	 * @var string
	 *
	 * @since  1.0
	 */
	protected $description = '';

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

		$this->setHelp('');
	}

	/**
	 * registerCommands
	 *
	 * @return  void
	 */
	protected function registerCommands()
	{
		$this->addCommand(new Command\Generate\Generate);
		$this->addCommand(new Command\Init\Init);
		$this->addCommand(new Command\Convert\Convert);
	}
}
