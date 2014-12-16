<?php
/**
 * Part of generator project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace CodeGenerator\Error;

/**
 * The ErrorHandler class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ErrorHandler
{
	/**
	 * The json error handler.
	 *
	 * @param integer $errno      The level of the error raised, as an integer.
	 * @param string  $errstr     The error message, as a string.
	 * @param string  $errfile    The filename that the error was raised in, as a string.
	 * @param integer $errline    The line number the error was raised at, as an integer.
	 * @param mixed   $errcontext An array that points to the active symbol table at the point the error occurred.
	 *                            In other words, errcontext will contain an array of every variable that existed
	 *                            in the scope the error was triggered in. User error handler must not modify error context.
	 *
	 * @throws \ErrorException
	 * @return  void
	 */
	public static function error($errno ,$errstr ,$errfile, $errline ,$errcontext)
	{
		$content = sprintf('%s. File: %s (line: %s)', $errstr, $errfile, $errno);

		$exception = new \ErrorException($content, $errno, 1, $errfile, $errline);

		throw $exception;
	}
}
