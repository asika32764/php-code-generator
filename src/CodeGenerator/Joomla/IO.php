<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla;

use CodeGenerator\IO\IOInterface;
use Joomla\Console\Command\Command;
use Joomla\Console\Output\Stdout;
use Joomla\Input;

/**
 * IO Adapter.
 *
 * @since 1.0
 */
class IO implements IOInterface
{
	/**
	 * Property input.
	 *
	 * @var  Input\Cli
	 */
	protected $input = null;

	/**
	 * Property output.
	 *
	 * @var  Stdout
	 */
	protected $output = null;

	/**
	 * Property command.
	 *
	 * @var  Command
	 */
	protected $command = null;

	/**
	 * Property inputStream.
	 *
	 * @var  resource
	 */
	protected $inputStream = STDIN;

	/**
	 * Constructor.
	 *
	 * @param Command $command
	 */
	public function __construct($command)
	{
		$this->input   = $command->getInput();
		$this->output  = $command->getOutput();
		$this->command = $command;
	}

	/**
	 * out
	 *
	 * @param string $msg
	 *
	 * @return  $this
	 */
	public function out($msg = '')
	{
		$this->command->out($msg);

		return $this;
	}

	/**
	 * in
	 *
	 * @param string $question
	 *
	 * @return  string|null
	 */
	public function in($question = '')
	{
		return $this->command->in($question);
	}

	/**
	 * err
	 *
	 * @param string $msg
	 *
	 * @return  $this
	 */
	public function err($msg = '')
	{
		$this->command->err($msg);

		return $this;
	}

	/**
	 * close
	 *
	 * @param string $msg
	 *
	 * @return  void
	 */
	public function close($msg = '')
	{
		$this->command->out($msg, true);

		exit();
	}

	/**
	 * getArgument
	 *
	 * @param string $offset
	 * @param string $default
	 *
	 * @return  mixed
	 */
	public function getArgument($offset, $default = null)
	{
		return $this->getArgument($offset, $default);
	}

	/**
	 * getOption
	 *
	 * @param string $name
	 * @param string $default
	 *
	 * @return  mixed
	 */
	public function getOption($name, $default = null)
	{
		return $this->command->getOption($name, $default);
	}

	/**
	 * getInput
	 *
	 * @return  \Joomla\Input\Input
	 */
	public function getInput()
	{
		return $this->input;
	}

	/**
	 * setInput
	 *
	 * @param   \Joomla\Input\Input $input
	 *
	 * @return  IO  Return self to support chaining.
	 */
	public function setInput($input)
	{
		$this->input = $input;

		return $this;
}

	/**
	 * getOutput
	 *
	 * @return  \Joomla\Console\Output\Stdout
	 */
	public function getOutput()
	{
		return $this->output;
	}

	/**
	 * setOutput
	 *
	 * @param   \Joomla\Console\Output\Stdout $output
	 *
	 * @return  IO  Return self to support chaining.
	 */
	public function setOutput($output)
	{
		$this->output = $output;

		return $this;
	}

	/**
	 * getInputStream
	 *
	 * @return  resource
	 */
	public function getInputStream()
	{
		return $this->inputStream;
	}

	/**
	 * setInputStream
	 *
	 * @param   resource $inputStream
	 *
	 * @return  IO  Return self to support chaining.
	 */
	public function setInputStream($inputStream)
	{
		$this->inputStream = $inputStream;

		return $this;
	}

	/**
	 * getCommand
	 *
	 * @return  \Joomla\Console\Command\Command
	 */
	public function getCommand()
	{
		return $this->command;
	}

	/**
	 * setCommand
	 *
	 * @param   \Joomla\Console\Command\Command $command
	 *
	 * @return  IO  Return self to support chaining.
	 */
	public function setCommand($command)
	{
		$this->command = $command;

		return $this;
	}
}
