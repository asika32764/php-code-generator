<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\FileOperator;

use CodeGenerator\IO\IOInterface;

/**
 * Abstract FileOperator
 */
class AbstractFileOperator
{
	/**
	 * IO adapter.
	 *
	 * @var  \CodeGenerator\IO\IOInterface
	 */
	protected $io;

	/**
	 * Constructor.
	 *
	 * @param IOInterface $io IO adapter.
	 */
	public function __construct(IOInterface $io)
	{
		$this->io = $io;
	}
}
