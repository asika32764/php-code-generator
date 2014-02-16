<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

/**
 * This is a default class for CodeGenerator Flower template
 *
 * @since 1.0
 */
class DefaultClass
{
	/**
	 * Property sakura.
	 *
	 * @var  string
	 */
	protected $sakura = 'SAKURA';

	/**
	 * getSakura
	 *
	 * @return  string
	 */
	public function getSakura()
	{
		return $this->sakura;
	}

	/**
	 * setSakura
	 *
	 * @param   string $sakura
	 *
	 * @return  DefaultClass  Return self to support chaining.
	 */
	public function setSakura($sakura)
	{
		$this->sakura = $sakura;

		return $this;
	}
}
 