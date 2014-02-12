<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Application;

use CodeGenerator\IO\IOInterface;
use Joomla\Application\AbstractCliApplication;
use Joomla\Application\Cli\CliOutput;
use Joomla\Console\Console;
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
	 * Constructor.
	 *
	 * @param IOInterface $io
	 * @param array       $config
	 */
	public function __construct(IOInterface $io, $config = array())
	{
		$input = $io->input;

		$output = $io->output;

		parent::__construct($input, $config, $output);
	}
}
 