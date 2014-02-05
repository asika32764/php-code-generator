<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace CodeGenerator\FileOperator;

use Joomla\Filesystem\File;
use Joomla\Filesystem\Path;

/**
 * Class ReplaceOperator
 *
 * @since 1.0
 */
class ReplaceOperator extends AbstractFileOperator
{
	/**
	 * Property replace.
	 *
	 * @var array
	 */
	protected $replace;

	/**
	 * replace
	 *
	 * @param string $src
	 * @param array  $replace
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
	 * replaceDir
	 *
	 * @param \SplFileInfo $src
	 * @param array        $replace
	 *
	 * @return  void
	 */
	protected function replaceDir($src, $replace = array())
	{
		$dir = new \RecursiveDirectoryIterator($src);

		$dir = new \RecursiveIteratorIterator($dir);

		foreach ($dir as $file)
		{
			if ($file->isDir())
			{
				continue;
			}

			$this->replaceFile($file, $replace);
		}
	}

	/**
	 * replaceFile
	 *
	 * @param \SplFileInfo $file
	 * @param array        $replace
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
	 * getReplace
	 *
	 * @return  array
	 */
	public function getReplace()
	{
		return $this->replace;
	}

	/**
	 * setReplace
	 *
	 * @param   array $replace
	 *
	 * @return  ReplaceOperator  Return self to support chaining.
	 */
	public function setReplace($replace)
	{
		$this->replace = $replace;

		return $this;
	}
}
