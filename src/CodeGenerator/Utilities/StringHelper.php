<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\Utilities;

/**
 * Class String
 *
 * @since 1.0
 */
class StringHelper
{
	/**
	 * quote
	 *
	 * @param string $string
	 * @param mixed  $quote
	 *
	 * @return  string
	 */
	public static function quote($string, $quote = array('{@', '@}'))
	{
		$quote = (array) $quote;

		if (empty($quote[1]))
		{
			$quote[1] = $quote[0];
		}

		return $quote[0] . $string . $quote[1];
	}

	/**
	 * backquote
	 *
	 * @param string $string
	 *
	 * @return  string
	 */
	public static function backquote($string)
	{
		return static::quote($string, '`');
	}

	/**
	 * parseVariable
	 *
	 * @param string $string
	 * @param array  $data
	 * @param array  $tags
	 *
	 * @throws \InvalidArgumentException
	 * @return  string
	 */
	public static function parseVariable($string, $data = array(), $tags = array('{@', '@}'))
	{
		$tags = (array) $tags;

		if (empty($tags[0]))
		{
			throw new \InvalidArgumentException('No tag variables');
		}

		if (empty($tags[1]))
		{
			$tags[1] = $tags[0];
		}

		foreach ($tags as &$tag)
		{
			$tag = str_split($tag);

			foreach($tag as &$letter)
			{
				$letter = '\\' . $letter;
			}

			$tag = implode('', $tag);
		}

		$regex = '/' . $tags[0] . '\s*(.+?)\s*' . $tags[1] . '/';

		return preg_replace_callback(
			$regex,
			function($match) use ($data)
			{
				$return = ArrayHelper::getByPath($data, $match[1]);

				if (is_array($return) || is_object($return))
				{
					return print_r($return, 1);
				}
				else
				{
					return $return;
				}
			},
			$string
		);
	}
}
 