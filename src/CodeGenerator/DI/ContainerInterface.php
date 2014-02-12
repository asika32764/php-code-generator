<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\DI;

/**
 * ContainerInterface
 *
 * An adapter to integrate any IOC containers.
 */
interface ContainerInterface
{
	/**
	 * Method to retrieve the results of running the $callback for the specified $key;
	 *
	 * @param   string   $key       Name of the dataStore key to get.
	 * @param   boolean  $forceNew  True to force creation and return of a new instance.
	 *
	 * @return  mixed   Results of running the $callback for the specified $key.
	 */
	public function get($key, $forceNew = false);

	/**
	 * Method to set the key and callback to the dataStore array.
	 *
	 * @param   string   $key        Name of dataStore key to set.
	 * @param   mixed    $value      Callable function to run or string to retrive when requesting the specified $key.
	 * @param   boolean  $singleton  True to create and store a shared instance.
	 *
	 * @return  ContainerInterface  This object for chaining.
	 */
	public function set($key, $value, $singleton = false);

	/**
	 * Convenience method for creating singleton keys.
	 *
	 * @param   string   $key    Name of dataStore key to set.
	 * @param   mixed    $value   Callable function to run when requesting the specified $key.
	 *
	 * @return  ContainerInterface  This object for chaining.
	 */
	public function singleton($key, $value);
}
 