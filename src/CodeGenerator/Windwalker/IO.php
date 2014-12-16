<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Windwalker;

use CodeGenerator\IO\IOInterface;
use Windwalker\Console\Command\AbstractCommand;

/**
 * IO Adapter.
 *
 * @since 1.0
 */
class IO implements IOInterface
{
	/**
	 * Property io.
	 *
	 * @var  \Windwalker\Console\IO\IOInterface
	 */
	protected $io;

	/**
	 * Property command.
	 *
	 * @var  AbstractCommand
	 */
	protected $command;

	/**
	 * Constructor.
	 *
	 * @param AbstractCommand $command  Current command because Windwalker Console using nested commands.
	 */
	public function __construct($command)
	{
		$this->io = $command->getIO();
		$this->command = $command;
	}

	/**
	 * Output message.
	 *
	 * @param  string  $msg  Message text.
	 * @param  bool    $nl   Break a new line
	 *
	 * @return IOInterface Return self to support chaining.
	 */
	public function out($msg = '', $nl = true)
	{
		$this->command->out($msg, $nl);

		return $this;
	}

	/**
	 * Ask an question from input stream.
	 *
	 * @param string $question  Question you want to ask.
	 *
	 * @return  string|null
	 */
	public function in($question = '')
	{
		return $this->command->in($question);
	}

	/**
	 * Error output.
	 *
	 * General stream is the STDERR.
	 *
	 * @param  string  $msg  Error text.
	 * @param  bool    $nl   Break a new line
	 *
	 * @return  IOInterface Return self to support chaining.
	 */
	public function err($msg = '', $nl = true)
	{
		$this->command->err($msg, $nl);

		return $this;
	}

	/**
	 * Close system.
	 *
	 * @param string $msg Message of close.
	 *
	 * @return  void
	 */
	public function close($msg = '')
	{
		$this->command->out($msg, true);

		exit();
	}

	/**
	 * Get argument from input.
	 *
	 * @param string $offset  Argument offset.
	 * @param string $default Default if not found.
	 *
	 * @return  mixed
	 */
	public function getArgument($offset, $default = null)
	{
		return $this->command->getArgument($offset, $default);
	}

	/**
	 * Get option from input.
	 *
	 * @param string $name    Option name.
	 * @param string $default Default if not found.
	 *
	 * @return  mixed
	 */
	public function getOption($name, $default = null)
	{
		return $this->command->getOption($name, $default);
	}

	/**
	 * Method to get property Io
	 *
	 * @return  \Windwalker\Console\IO\IOInterface
	 */
	public function getIO()
	{
		return $this->io;
	}

	/**
	 * Method to set property io
	 *
	 * @param   \Windwalker\Console\IO\IOInterface $io
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setIO($io)
	{
		$this->io = $io;

		return $this;
	}

	/**
	 * Method to get property Command
	 *
	 * @return  AbstractCommand
	 */
	public function getCommand()
	{
		return $this->command;
	}

	/**
	 * Method to set property command
	 *
	 * @param   AbstractCommand $command
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setCommand($command)
	{
		$this->command = $command;

		return $this;
	}
}
