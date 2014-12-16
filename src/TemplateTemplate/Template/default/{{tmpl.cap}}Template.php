<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace {{tmpl.cap}}Template;

use {{project.class}}\IO\IOInterface;
use {{project.class}}\Template\AbstractTemplate;
use Windwalker\Registry\Registry;

/**
 * Template main entry.
 */
class {{tmpl.cap}}Template extends AbstractTemplate
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
	 * @throws \RuntimeException
	 * @return  array
	 */
	protected function registerReplaces($io, $replace = array())
	{
		$item = $io->getOption('n', '{{item.lower}}');

		/*
		 * Replace with your code name.
		 */

		// Set item name, default is {{item.lower}}
		$replace['item.lower'] = strtolower($item);
		$replace['item.upper'] = strtoupper($item);
		$replace['item.cap']   = ucfirst($item);

		// Set project name
		$replace['project.class'] = '{{project.class}}';

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
		/*
		 * Replace with your project path.
		 */

		$subTemplate = $io->getOption('t', 'default');
		$dest        = $io->getArgument(1) ? : 'generated';

		$config['path.src']  = __DIR__ . '/Template/' . $subTemplate;
		$config['path.dest'] = GENERATOR_PATH . '/' . $dest;

		return $config;
	}
}
