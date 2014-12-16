<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Windwalker\Command\Generate;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Windwalker\IO;
use Windwalker\Console\Command\Command;

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
Generate operation.
HELP;

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 *
	 * @since  1.0
	 */
	protected $usage = 'gen <cmd><source></cmd> <cmd><dest></cmd> [options]';

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
