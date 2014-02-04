<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\FileOperator;

use CodeGenerator\IO\IOInterface;

/**
 * Class AbstractFileOperator
 *
 * @since 1.0
 */
class AbstractFileOperator
{
	/**
	 * Property io.
	 *
	 * @var  \CodeGenerator\IO\IOInterface
	 */
	protected $io;

	/**
	 * Constructor.
	 *
	 * @param IOInterface $io
	 */
	public function __construct(IOInterface $io)
	{
		$this->io = $io;
	}
}
