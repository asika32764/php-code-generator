<?php
/**
 * Part of php-code-generator project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include dirname(__DIR__) . '/vendor/autoload.php';

$container = \CodeGenerator\Joomla\DI\Container::getInstance();

$container->registerServiceProvider(new \CodeGenerator\Joomla\Provider\ServiceProvider);

$app = $container->get('app');

$app->execute();
