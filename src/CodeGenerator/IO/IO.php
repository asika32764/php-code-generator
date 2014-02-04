<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\IO;

/**
 * IO Adapter.
 *
 * @since 1.0
 */
class IO implements IOInterface
{
	/**
	 * out
	 *
	 * @param string $msg
	 *
	 * @return  $this
	 */
	public function out($msg = '')
	{
		// TODO: Implement out() method.
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
		// TODO: Implement in() method.
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
		// TODO: Implement err() method.
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
		// TODO: Implement close() method.
	}
}
