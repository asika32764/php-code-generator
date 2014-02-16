<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\FileOperator;

use CodeGenerator\Filesystem\File;

/**
 * Convert Operator
 */
class ConvertOperator extends CopyOperator
{
	/**
	 * Copy per file.
	 *
	 * @param string $src     Source path.
	 * @param string $dest    Destination path.
	 * @param array  $replace Replace array.
	 *
	 * @return  void
	 */
	protected function copyFile($src, $dest, $replace = array())
	{
		// Replace dest file name.
		$dest = strtr($dest, $replace);

		if (is_file($dest))
		{
			$this->io->out('File exists: ' . $dest);
		}
		else
		{
			$content = strtr(file_get_contents($src), $replace);

			if (File::write($dest, $content))
			{
				$this->io->out('File created: ' . $dest);
			}
		}
	}
}
