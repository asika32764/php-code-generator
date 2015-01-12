# PHP Code Generator

[![Latest Stable Version](https://poser.pugx.org/asika/php-code-generator/v/stable.svg)](https://packagist.org/packages/asika/php-code-generator) [![Total Downloads](https://poser.pugx.org/asika/php-code-generator/downloads.svg)](https://packagist.org/packages/asika/php-code-generator) [![Latest Unstable Version](https://poser.pugx.org/asika/php-code-generator/v/unstable.svg)](https://packagist.org/packages/asika/php-code-generator) [![License](https://poser.pugx.org/asika/php-code-generator/license.svg)](https://packagist.org/packages/asika/php-code-generator)

Repository deprecated, please see: [Muse](https://github.com/asika32764/muse)

## Installation via Composer

Add this dependency in your `composer.json`.

``` json
{
    "require": {
        "asika/php-code-generator": "2.*",
        "windwalker/console": "~2.0"
    }
}
```

Or just create a project:

``` shell
php composer.phar create-project asika/php-code-generator php-code-generator 2.*
```

## Getting Started

PHP Code Generator is a command line based program, we will do everything though CLI. Please type:

``` shell
php bin/generator
```

You will get this help message:

```
PHP Code Generator - version: 2
------------------------------------------------------------

[generator Help]

The default application command

Usage:
  generator <command> [option]


Options:

  -h | --help       Display this help message.
  -q | --quiet      Do not output any message.
  -v | --verbose    Increase the verbosity of messages.
  --ansi            Set 'off' to suppress ANSI colors on unsupported terminals.
  -p | --path       Dest path.
  -t | --tmpl       Sub template name.

Commands:

  gen             Genarate operation.
  tmpl-init       Init a new template.
  tmpl-convert    Convert a directory and files back to a template.
```

### Generate code by Acme Template

Acme template is a default template in PHP Code Generator, generating code is very easy, please type:

``` bash
php bin/generator gen acme test/MyApp
```

Now you will see message like below:

``` bash
$ php bin/generator gen acme test/MyApp
File created: /var/www/php-code-generator/test/MyApp/admin/article/edit.twig
File created: /var/www/php-code-generator/test/MyApp/admin/article/index.twig
File created: /var/www/php-code-generator/test/MyApp/admin/category/edit.twig
File created: /var/www/php-code-generator/test/MyApp/admin/category/index.twig
File created: /var/www/php-code-generator/test/MyApp/article.twig
File created: /var/www/php-code-generator/test/MyApp/global/index.html
File created: /var/www/php-code-generator/test/MyApp/index.html
File created: /var/www/php-code-generator/test/MyApp/index.twig
```

### Put your SubTemplate to Acme Template

Now you can put your code to `src/AcmeTemplate/Template/mytmpl`.

And using this command to generate your sub template:

``` bash
php bin/generator gen acme test/MyApp2 -t mytmpl
```

## Create your project template

Now everything is very easy, but how can we create our own template? We have to write some code to configure paths and variables.

### Init a sample template

Using this command to init a new template.

``` bash
php bin/generator tmpl-init flower
```

```
File created: /var/www/php-code-generator/src/FlowerTemplate/Action/ConvertAction.php
File created: /var/www/php-code-generator/src/FlowerTemplate/Action/CopyAllAction.php
File created: /var/www/php-code-generator/src/FlowerTemplate/Task/Convert.php
File created: /var/www/php-code-generator/src/FlowerTemplate/Task/Generate.php
File created: /var/www/php-code-generator/src/FlowerTemplate/Template/default/DefaultClass.php
File created: /var/www/php-code-generator/src/FlowerTemplate/FlowerTemplate.php
```

OK, we created a sample template named `flower`, this template will locate at `src/FlowerTemplate` with an entry class `FlowerTemplate`,
actually you can create it manually, but this will be a little complex, so we are better using the sample first.

### Configure Variable and Paths

Open `FlowerTemplate`, you can set replaced string and copy path here:

#### Register replacing variables

``` php
protected $tagVariable = array('{@', '@}');

protected function registerReplaces($io, $replace = array())
{
    $item = $io->getOption('n', 'sakura');

    /*
     * Replace with your code name.
     */

    // Set item name, default is sakura
    $replace['item.lower'] = strtolower($item);
    $replace['item.upper'] = strtoupper($item);
    $replace['item.cap']   = ucfirst($item);

    // Set project name
    $replace['project.class'] = 'CodeGenerator';

    return $replace;
}
```

This example means we can type `-n {item}` to be a variable name. And in template code,
the `{@item.lower@}` /`{@item.upper@}` /`{@item.cap@}` will be replace to the item name.

`sakura` is the default value if you don't give the `-n` param. This is an example that if `-n` not found,
just exit and notice user type this param:

``` php
$item = $io->getOption('n') ? : exit('Please give me item using "-n {item_name}"');
```

You can add many string to `$replace` array, remember you will need each lower, upper and capital cases, and don't forget to return it.

#### Register Config & Paths

``` php
protected function registerConfig($io, $config)
{
    /*
     * Replace with your project path.
     */

    $subTemplate = $io->getOption('t', 'default');
    $dest        = $io->getArgument(1) ? : 'generated';

    $config['path.src']  = __DIR__ . '/Template/' . $subTemplate;
    $config['path.dest'] = GENERATOR_PATH . '/' . $dest;

    return $config;
}
```

You can set some useful config in this method, the most important is `path.src` and `path.dest`. These two config tell PHP Code Generator
  where code from and where code copied to.

`GENERATOR_PATH` is root path of PHP Code Generator, and the `$io->getArgument(1)` means get second argument of your command(First is 0).

### Task & Action

We have two default task controller, `Generate` and `Convert`.

Generate task does the code generate action, and Convert task can help us convert code back to a template.
In task controller we can using `doAction()` to execute some different action to do something we want to do.

The `Generate` controller class:

``` php
namespace FlowerTemplate\Task;

use FlowerTemplate\Action;
use CodeGenerator\Controller\AbstractTaskController;

class Generate extends AbstractTaskController
{
	public function execute()
	{
		$this->doAction(new Action\CopyAllAction);
	}
}
```

The `CopyAllAction` class

``` php
namespace FlowerTemplate\Action;

use CodeGenerator\Action\AbstractAction;
use CodeGenerator\FileOperator\CopyOperator;

class CopyAllAction extends AbstractAction
{
	protected function doExecute()
	{
		$copyOperator = new CopyOperator($this->io, (array) $this->config['tag.variable']);

		$copyOperator->copy($this->config['path.src'], $this->config['path.dest'], $this->config['replace']);
	}
}
```

These two class all very simple and follows single responsibility principle, we can organize our multiple actions in one controller like below:

``` php
class Generate extends AbstractTaskController
{
	public function execute()
	{
		$this->doAction(new Action\CopyAllAction);

		$this->doAction(new Action\ImportSqlAction);

		$this->doAction(new Action\Github\CloneSomeRepoAction);

		$this->doAction(new Action\User\CreateNewUserAction);
	}
}
```

The benefit of single action class is that we can re-use every classes in different task.

### File Operation

#### Operator classes

We provides two operators now, `copyOperator` help us copy codes and replace tag to variables,
`convertOperator` help us copy code too, but replace variable by tags.

Just new an instance and using copy method:

``` php
$copyOperator = new CopyOperator($this->io, array('{@', '@}'));

$copyOperator->copy($src, $dest, $replaceArray);
```

There will be more operator(eg: `databaseOperator`, `gitOperator`) in the future.

#### Filesystem

There are three filesystem classes: `Path`, `File` and `Folder`, which extends from Windwalker Filesystem package,
please see: https://github.com/ventoviro/windwalker-filesystem

Simple usage:

``` php
namespace CodeGenerator\Filesystem;

Filesystem\Folder::copy($src, $dest);
Filesystem\Folder::move($src, $dest);
Filesystem\Folder::create($path);
Filesystem\Folder::delete($path);

Filesystem\File::copy($src, $dest);
Filesystem\File::move($src, $dest);
Filesystem\File::write($path, $buffer);
Filesystem\File::delete($path);

// Replace / and \ to DIRECTORY_SEPARATOR
$path = Filesystem\Path::clean($path);
```

So you can using Filesystem classes in Action class to help you operate files and directories.

### Create a new Task

If you want a new task controller, this will need some steps to create a task. The process not very easy,
we will make the process easier in the future.

#### (1) Create a new Command

Create a command class in `src/CodeGenerator/Windwalker/Command/MyTask/MyTask.php`

``` php
namespace CodeGenerator\Windwalker\Command\MyTask;

use CodeGenerator\Controller\GeneratorController;
use CodeGenerator\Windwalker\IO;
use Windwalker\Console\Command\Command;

class MyTask extends Command
{
	protected $name = 'mytask';

	protected $description = 'Desc of my task.';

	protected $usage = 'mytask <cmd><tmpl-name></cmd> <option>[option]</option>';

	public function configure()
	{
		parent::configure();
	}

	protected function doExecute()
	{
		$controller = new GeneratorController(new IO($this));

		$controller->setTask('mytask')->execute();
	}
}
```

How to use Windwalker Console and Command? See: https://github.com/ventoviro/windwalker-console

#### (2) Register your command to application

Register this command in `src/CodeGenerator/Windwalker/Application::registerCommands()`

``` php
protected function registerCommands()
{
    $this->addCommand(new Command\Generate\Generate);
    $this->addCommand(new Command\Init\Init);
    $this->addCommand(new Command\Convert\Convert);

    // Add here
    $this->addCommand(new Command\MyTask\Task);
}
```

You will get new help like this:

```
Available commands:

  gen             Genarate operation.
  tmpl-init       Init a new extension.
  tmpl-convert    Convert a code folder back to a template.
  mytask          Desc of my task.

```

#### (3) Create a new Task controller

Create a class in `src/FlowerTemplate/Task/MyTask.php`

``` php
namespace FlowerTemplate\Task;

use FlowerTemplate\Action;
use CodeGenerator\Controller\TaskController;

class MyTask extends TaskController
{
	public function execute()
	{
		$this->doAction(new Action\CopyAllAction);
	}
}
```

Now you can do some actions here.

#### (4) Test your task

Typing this command and you can go into your task controller:

``` bash
php bin/generator mytask <arguments>
```

## Integrate To Your Project or Framework

PHP Code Generator can integrate to any framework instead default Windwalker Console Application. Just create an `IO` class
to help PHP Code Generator input and output some information:

``` php
use CodeGenerator\IO\IOInterface;

class MyIOAdapter implements IOInterface
{
    // Implelemt this interface
}
```

Then use `GeneratorController` in your project entry (For example: Symfony Console):

``` php
$controller = new GeneratorController(new MyIOAdapter($input, $output));

$controller->setTask($input->getArgument('task'))->execute();
```

OK it's very easy, have a good time in your code recipe.

## Todo

- DatabaseOperator
- GitOperator
- FtpOperator
- UnitTest
- Completed docblock
- Easy to add task controller and command
