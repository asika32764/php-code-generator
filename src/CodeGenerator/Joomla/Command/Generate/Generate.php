<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla\Command\Generate;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Joomla\IO;
use Joomla\Console\Command\Command;

/**
 * Generate
 */
class Generate extends Command
{
	/**
	 * Console(Argument) name.
	 *
	 * @var  string
	 *
	 * @since  1.0
	 */
	protected $name = 'gen';

	/**
	 * The command description.
	 *
	 * @var  string
	 *
	 * @since  1.0
	 */
	protected $description = 'Genarate operation.';

	/**
	 * The manual about this command.
	 *
	 * @var  string
	 *
	 * @since  1.0
	 */
	protected $help = <<<HELP
Genarate operation.
HELP;

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 *
	 * @since  1.0
	 */
	protected $usage = '%s <cmd><command></cmd> <option>[option]</option>';

	/**
	 * configure
	 *
	 * @return  void
	 */
	protected function configure()
	{
		// $this->
	}

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$io = new IO($this);

		$controller = new GeneratorController($io);

		$controller->setTask('generate')->execute();
	}
}
