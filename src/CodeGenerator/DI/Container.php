<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\DI;

use Joomla\DI\Container as JoomlaContainer;

/**
 * Class Container
 *
 * @since 1.0
 */
class Container extends JoomlaContainer
{
	/**
	 * Property instance.
	 *
	 * @var Container
	 */
	protected static $instance;

	/**
	 * getInstance
	 *
	 * @return Container
	 */
	public static function getInstance()
	{
		if (!(self::$instance instanceof JoomlaContainer))
		{
			self::$instance = new static;
		}

		return self::$instance;
	}
}
