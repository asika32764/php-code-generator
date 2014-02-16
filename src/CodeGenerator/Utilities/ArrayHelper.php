<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Utilities;

/**
 * Class ArrayHelper
 *
 * @since 1.0
 */
class ArrayHelper
{
	/**
	 * getByPath
	 *
	 * @param mixed $data
	 * @param mixed $arguments
	 *
	 * @return  mixed
	 */
	public static function getByPath($data, $arguments)
	{
		if (empty($arguments))
		{
			return null;
		}

		$args = is_array($arguments) ? $arguments : explode('.', $arguments);

		$dataTmp = $data;

		foreach ($args as $arg)
		{
			if (is_object($dataTmp) && !empty($dataTmp->$arg))
			{
				$dataTmp = $dataTmp->$arg;
			}
			elseif (is_array($dataTmp) && !empty($dataTmp[$arg]))
			{
				$dataTmp = $dataTmp[$arg];
			}
			else
			{
				return null;
			}
		}

		return $dataTmp;
	}
}
 