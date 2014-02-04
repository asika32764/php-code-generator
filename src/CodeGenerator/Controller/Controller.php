<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Controller;

use CodeGenerator\DI\Container;
use CodeGenerator\IO\IOInterface;
use Joomla\Input;

/**
 * CodeGenerator Controller.
 */
abstract class Controller implements ControllerInterface
{
	/**
	 * Property io.
	 *
	 * @var
	 */
	protected $io;

	/**
	 * Instantiate the controller.
	 *
	 * @param   IOInterface  $io  The Controller object.
	 */
	public function __construct(IOInterface $io)
	{
		// Setup dependencies.
		$this->io = $io;
	}

	/**
	 * Write a string to standard output.
	 *
	 * @param   string   $text  The text to display.
	 * @param   boolean  $nl    True (default) to append a new line at the end of the output string.
	 *
	 * @return  Controller  Instance of $this to allow chaining.
	 *
	 * @since   1.0
	 */
	public function out($text = '', $nl = true)
	{
		$this->io->out($text, $nl);

		return $this;
	}

	/**
	 * Write a string to standard error output.
	 *
	 * @param   string   $text  The text to display.
	 * @param   boolean  $nl    True (default) to append a new line at the end of the output string.
	 *
	 * @return  Controller  Instance of $this to allow chaining.
	 *
	 * @since   1.0
	 */
	public function err($text = '', $nl = true)
	{
		$this->io->err($text, $nl);

		return $this;
	}

	/**
	 * Get a value from standard input.
	 *
	 * @param   string  $question  The question you want to ask user.
	 *
	 * @return  string  The input string from standard input.
	 *
	 * @since   1.0
	 */
	public function in($question = '')
	{
		return $this->io->in($question);
	}

	/**
	 * close
	 *
	 * @param string $text
	 * @param bool   $nl
	 *
	 * @return  void
	 */
	public function close($text = '', $nl = false)
	{
		$this->io->close($text, $nl);
	}
}
