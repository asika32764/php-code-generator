<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla\Command\Init;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Joomla\IO;
use Joomla\Console\Command\Command;

/**
 * Class Init
 *
 * @since  1.0
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
	protected $description = 'Init a new extension.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'tmpl-init <cmd><tmpl-name></cmd> <option>[option]</option>';

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
	 * doExecute
	 *
	 * @throws \InvalidArgumentException
	 * @return  mixed
	 */
	protected function doExecute()
	{
		if (empty($this->input->args[0]))
		{
			throw new \InvalidArgumentException('Please give me template name.');
		}

		$this->input->args[1] = $this->input->args[0];

		$this->input->args[0] = 'template';

		$io = new IO($this);

		$controller = new GeneratorController($io);

		$controller->setTask('generate')->execute();
	}
}
