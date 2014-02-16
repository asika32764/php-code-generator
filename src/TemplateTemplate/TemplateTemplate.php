<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace TemplateTemplate;

use CodeGenerator\IO\IOInterface;
use CodeGenerator\Template\Template;
use Joomla\Registry\Registry;

/**
 * Template main entry.
 */
class TemplateTemplate extends Template
{
	/**
	 * Tag variable.
	 *
	 * @var  array
	 */
	protected $tagVariable = array('{{', '}}');

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
		$item = $io->getOption('n', 'sakura');
		$tmpl = $io->getArgument(1) ? : 'flower';

		// Set item name, default is sakura
		$replace['item.lower'] = strtolower($item);
		$replace['item.upper'] = strtoupper($item);
		$replace['item.cap']   = ucfirst($item);


		// Set project name
		$replace['project.class'] = 'CodeGenerator';

		// Set Template name
		$replace['tmpl.lower'] = strtolower($tmpl);
		$replace['tmpl.upper'] = strtoupper($tmpl);
		$replace['tmpl.cap']   = ucfirst($tmpl);

		return $replace;
	}

	/**
	 * Register config and path.
	 *
	 * @param IOInterface    $io     The IO adapter.
	 * @param array|Registry $config Config object or array.
	 *
	 * @throws \InvalidArgumentException
	 * @return  array
	 */
	protected function registerConfig($io, $config)
	{
		$subTemplate = $io->getOption('t', 'default');
		$dest        = $io->getArgument(1) ? : 'flower';

		if (strtolower($dest) == 'template')
		{
			throw new \InvalidArgumentException('Please don\'t use "template" as your template name');
		}

		$config['path.src']  = __DIR__ . '/Template/' . $subTemplate;
		$config['path.dest'] = GENERATOR_PATH . '/src/' . ucfirst($dest) . 'Template';

		return $config;
	}
}
