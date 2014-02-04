<?php
/**
 * Part of Windwalker project. 
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
	 * getArgument
	 *
	 * @param string $offset
	 * @param string $default
	 *
	 * @return  mixed
	 */
	public function getArgument($offset, $default = null);

	/**
	 * getOption
	 *
	 * @param string $name
	 * @param string $default
	 *
	 * @return  mixed
	 */
	public function getOption($name, $default = null);

	/**
	 * out
	 *
	 * @param string $msg
	 *
	 * @return  $this
	 */
	public function out($msg = '');

	/**
	 * in
	 *
	 * @param string $question
	 *
	 * @return  string|null
	 */
	public function in($question = '');

	/**
	 * err
	 *
	 * @param string $msg
	 *
	 * @return  $this
	 */
	public function err($msg = '');

	/**
	 * close
	 *
	 * @param string $msg
	 *
	 * @return  void
	 */
	public function close($msg = '');
}
