<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Application;

/**
 * Interface ApplicationInterface
 */
interface ApplicationInterface
{
	/**
	 * Get IO adapter.
	 *
	 * @return  \CodeGenerator\IO\IOInterface
	 */
	public function getIO();

	/**
	 * Set IO adapter.
	 *
	 * @param   \CodeGenerator\IO\IOInterface $io
	 *
	 * @return  ApplicationInterface  Return self to support chaining.
	 */
	public function setIO($io);
}
 