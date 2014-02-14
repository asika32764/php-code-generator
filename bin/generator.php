<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include dirname(__DIR__) . '/vendor/autoload.php';

use CodeGenerator\Joomla\Application;
use Joomla\Console\Output\Stdout;

$app = new Application(null, null, new Stdout);

$app->execute();
