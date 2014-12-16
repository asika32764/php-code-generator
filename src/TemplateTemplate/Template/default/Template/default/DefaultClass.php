<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

/**
 * This is a default class for {@project.class@} {@tmpl.cap@} template
 *
 * @since 1.0
 */
class DefaultClass
{
	/**
	 * Property {@item.lower@}.
	 *
	 * @var  string
	 */
	protected ${@item.lower@} = '{@item.upper@}';

	/**
	 * get{@item.cap@}
	 *
	 * @return  string
	 */
	public function get{@item.cap@}()
	{
		return $this->{@item.lower@};
	}

	/**
	 * set{@item.cap@}
	 *
	 * @param   string ${@item.lower@}
	 *
	 * @return  DefaultClass  Return self to support chaining.
	 */
	public function set{@item.cap@}(${@item.lower@})
	{
		$this->{@item.lower@} = ${@item.lower@};

		return $this;
	}
}
