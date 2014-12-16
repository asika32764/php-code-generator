<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Windwalker\Command\Init;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Windwalker\IO;
use Windwalker\Console\Command\Command;
use Windwalker\Console\Prompter\NotNullPrompter;

/**
 * Class Init
 */
class Init extends Command
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
	protected $name = 'tmpl-init';

	/**
	 * The command description.
	 *
	 * @var  string
	 */
	protected $description = 'Init a new template.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'tmpl-init <cmd><tmpl-name></cmd> <option>[option]</option>';

	/**
	 * doExecute
	 *
	 * @throws \InvalidArgumentException
	 * @return  mixed
	 */
	protected function doExecute()
	{
		if (!$this->getArgument(0, new NotNullPrompter('Enter template name: ')))
		{
			throw new \InvalidArgumentException('Please give me template name.');
		}

		$this->io->setArgument(1, $this->getArgument(0));

		$this->io->setArgument(0, 'template');

		$io = new IO($this);

		$controller = new GeneratorController($io);

		$controller->setTask('generate')->execute();
	}
}
