<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla\Command\Convert;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Joomla\IO;
use Joomla\Console\Command\Command;

/**
 * Class Convert
 *
 * @since  2.0
 */
class Convert extends Command
{
	/**
	 * An enabled flag.
	 *
	 * @var bool
	 */
	public static $isEnabled = true;

	/**
	 * Console(Argument) name.
	 *
	 * @var  string
	 */
	protected $name = 'tmpl-convert';

	/**
	 * The command description.
	 *
	 * @var  string
	 */
	protected $description = 'Convert a code folder back to a template.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'tmpl-convert <cmd><tmpl-name></cmd> <cmd><dest-folder></cmd> <option>[option]</option>';

	/**
	 * Configure command information.
	 *
	 * @return void
	 */
	public function configure()
	{
		// $this->addArgument();

		parent::configure();
	}

	/**
	 * Execute this command.
	 *
	 * @return int|void
	 */
	protected function doExecute()
	{
		$io = new IO($this);

		$controller = new GeneratorController($io);

		$controller->setTask('convert')->execute();
	}
}
