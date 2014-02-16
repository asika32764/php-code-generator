<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace FlowerTemplate;

use CodeGenerator\IO\IOInterface;
use CodeGenerator\Template\Template;
use Joomla\Registry\Registry;

/**
 * Template main entry.
 */
class FlowerTemplate extends Template
{
	/**
	 * Using {@...@} to prevent twig conflict.
	 *
	 * @var  array
	 */
	protected $tagVariable = array('{@', '@}');

	/**
	 * Register replace string.
	 *
	 * @param IOInterface $io      The IO adapter.
	 * @param array       $replace Replace string array.
	 *
	 * @return  array
	 */
	protected function registerReplaces($io, $replace = array())
	{
		$replace['item.lower'] = 'sakura';
		$replace['item.upper'] = 'Sakura';
		$replace['item.cap']   = 'SAKURA';

		return $replace;
	}

	/**
	 * Register config and path.
	 *
	 * @param IOInterface    $io     The IO adapter.
	 * @param array|Registry $config Config object or array.
	 *
	 * @return  array
	 */
	protected function registerConfig($io, $config)
	{
		$subTemplate = $io->getOption('t', 'default');
		$dest        = $io->getArgument(1) ? : 'generated';

		$config['path.src']  = __DIR__ . '/Template/' . $subTemplate;
		$config['path.dest'] = GENERATOR_PATH . '/' . $dest;

		return $config;
	}
}
