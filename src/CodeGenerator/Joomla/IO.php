<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Joomla;

use CodeGenerator\IO\IOInterface;
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
	 * Property inputStream.
	 *
	 * @var  resource
	 */
	protected $inputStream = STDIN;

	/**
	 * Constructor.
	 *
	 * @param Input\Cli  $input
	 * @param Stdout     $output
	 */
	public function __construct(Input\Cli $input = null, Stdout $output = null)
	{
		$this->input  = $input  ? : new Input\Cli;
		$this->output = $output ? : new Stdout;
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
		$this->output->out($msg);

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
		if ($question)
		{
			$this->out($question, false);
		}

		return rtrim(fread($this->inputStream, 8192), "\n\r");
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
		$this->output->err($msg);

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
		$this->output->out($msg);

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
		$args = $this->input->args;

		if (isset($args[$offset]))
		{
			return $args[$offset];
		}

		if (is_callable($default))
		{
			return $default();
		}

		return $default;
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
		return $this->input->get($name, $default);
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
}
