<?php
/**
 * Part of php-code-generator project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\FileOperator;

use CodeGenerator\Filesystem\File;
use CodeGenerator\Filesystem\Path;

/**
 * Replace Operator
 */
class ReplaceOperator extends AbstractFileOperator
{
	/**
	 * Replace string.
	 *
	 * @var array
	 */
	protected $replace;

	/**
	 * Replace variable of files.
	 *
	 * @param string $src     Target path.
	 * @param array  $replace Replace array.
	 *
	 * @return  void
	 */
	public function replace($src, $replace = array())
	{
		$replace = $replace ? : $this->replace;

		$src  = Path::clean($src);

		if (is_file($src))
		{
			$this->replaceFile(new \SplFileInfo($src, \FilesystemIterator::CURRENT_AS_FILEINFO), $replace);
		}
		else
		{
			$this->replaceDir($src, $replace);
		}
	}

	/**
	 * Replace dir.
	 *
	 * @param \SplFileInfo $src     Target dir.
	 * @param array        $replace Replace array.
	 *
	 * @return  void
	 */
	protected function replaceDir($src, $replace = array())
	{
		$dir = new \RecursiveDirectoryIterator($src);

		$dir = new \RecursiveIteratorIterator($dir);

		foreach ($dir as $file)
		{
			/** @var $file \SplFileInfo */
			if ($file->isDir())
			{
				continue;
			}

			$this->replaceFile($file, $replace);
		}
	}

	/**
	 * Replace per file.
	 *
	 * @param \SplFileInfo $file    Target dir.
	 * @param array        $replace Replace array.
	 *
	 * @return  void
	 */
	protected function replaceFile($file, $replace = array())
	{
		$tmp  = $file->getRealPath() . '~';
		$file = $file->getRealPath();

		File::move($file, $tmp);

		$content = file_get_contents($tmp);
		$content = strtr($content, $replace);
		$file    = strtr($file, $replace);

		if (File::write($file, $content))
		{
			$this->io->out('File replaced: ' . $file);
		}

		File::delete($tmp);
	}

	/**
	 * Replace array getter.
	 *
	 * @return  array
	 */
	public function getReplace()
	{
		return $this->replace;
	}

	/**
	 * Replace array setter.
	 *
	 * @param   array $replace  Replace array.
	 *
	 * @return  CopyOperator  Return self to support chaining.
	 */
	public function setReplace($replace)
	{
		$this->replace = $replace;

		return $this;
	}
}
