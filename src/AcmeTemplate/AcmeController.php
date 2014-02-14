<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace AcmeTemplate;

use CodeGenerator\Controller\TaskController;
use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Class AcmeController
 *
 * @since 1.0
 */
abstract class AcmeController extends TaskController
{
	/**
	 * Instantiate the controller.
	 *
	 * @param   IOInterface $io     The Controller object.
	 * @param   Registry    $config Config
	 */
	public function __construct(IOInterface $io, Registry $config = null)
	{
		parent::__construct($io, $config);
	}
}
