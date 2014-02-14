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

		$this->registerReplaces($io);

		$this->registerPaths($io);
	}

	/**
	 * registerReplaces
	 *
	 * @param IOInterface $io
	 *
	 * @return  void
	 */
	protected function registerReplaces($io)
	{
		$this->replace['{@ item.lower @}'] = 'article';
		$this->replace['{@ item.upper @}'] = 'ARTICLE';
		$this->replace['{@ item.cap @}']   = 'Article';
	}

	/**
	 * registerPaths
	 *
	 * @param IOInterface $io
	 *
	 * @return  array
	 */
	protected function registerPaths($io)
	{
		$subTemplate = $io->getOption('t', 'default');
		$dest        = $io->getArgument(1) ? : 'dest';

		$this->config['path.src']  = __DIR__ . '/Template/' . $subTemplate;
		$this->config['path.dest'] = GENERATOR_PATH . '/' . $dest;

		// $config['tag.variable'] = array('[[', ']]');
	}
}
