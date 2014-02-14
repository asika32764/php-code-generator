<?php
/**
 * Part of code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace AcmeTemplate\Task;

use AcmeTemplate\AcmeController;
use AcmeTemplate\Action;
use CodeGenerator\IO\IOInterface;
use Joomla\Registry\Registry;

/**
 * Class AcmeController
 *
 * @since 1.0
 */
class Generate extends AcmeController
{
	/**
	 * Constructor.
	 *
	 * @param IOInterface $io
	 * @param Registry    $config
	 */
	public function __construct(IOInterface $io, Registry $config = null)
	{
		$subTemplate = $io->getOption('t', 'default');

		$config['path.src']  = dirname(__DIR__) . '/Template/' . $subTemplate;

		$dest = $io->getArgument(1) ? : 'dest';

		$config['path.dest'] = GENERATOR_PATH . '/' . $dest;

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
