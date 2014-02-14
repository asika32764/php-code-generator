<?php
/**
 * Part of code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace AcmeTask\Controller;

use AcmeTask\Action;
use CodeGenerator\Controller\TaskController;
use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Class AcmeController
 *
 * @since 1.0
 */
class AcmeController extends TaskController
{
	/**
	 * Constructor.
	 *
	 * @param IOInterface $io
	 * @param Registry    $config
	 */
	public function __construct(IOInterface $io, Registry $config = null)
	{
		$template = $io->getOption('t');

		$config['path.src'] = __DIR__ . '/Resources';

		parent::__construct($io, $config);
	}

	/**
	 * Execute the controller.
	 *
	 * @return  boolean  True if controller finished execution, false if the controller did not
	 *                   finish execution. A controller might return false if some precondition for
	 *                   the controller to run has not been satisfied.
	 *
	 * @since   1.0
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function execute()
	{
		$this->doAction(new Action\CopyAllAction);
	}
}
