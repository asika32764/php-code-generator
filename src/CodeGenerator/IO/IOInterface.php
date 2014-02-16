<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\IO;

/**
 * Interface IOInterface
 */
interface IOInterface
{
	/**
	 * Get argument from input.
	 *
	 * @param string $offset  Argument offset.
	 * @param string $default Default if not found.
	 *
	 * @return  mixed
	 */
	public function getArgument($offset, $default = null);

	/**
	 * Get option from input.
	 *
	 * @param string $name    Option name.
	 * @param string $default Default if not found.
	 *
	 * @return  mixed
	 */
	public function getOption($name, $default = null);

	/**
	 * Output message.
	 *
	 * @param string $msg Message text.
	 *
	 * @return  IOInterface Return self to support chaining.
	 */
	public function out($msg = '');

	/**
	 * Ask an question from input stream.
	 *
	 * @param string $question  Question you want to ask.
	 *
	 * @return  string|null
	 */
	public function in($question = '');

	/**
	 * Error output.
	 *
	 * General stream is the STDERR.
	 *
	 * @param string $msg
	 *
	 * @return  IOInterface Return self to support chaining.
	 */
	public function err($msg = '');

	/**
	 * Close system.
	 *
	 * @param string $msg Message of close.
	 *
	 * @return  void
	 */
	public function close($msg = '');
}
