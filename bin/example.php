<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include_once './../bootstrap.php';

use \Carapace\Core\ScriptAbstract as Script;
use \Carapace\Collection;
use \Carapace\Core\GUI\Frame;
use \Carapace\Core\GUI\Frame\Panel;
use \Carapace\Core\Terminal\Scanner;
use \Carapace\Core\Cursor;

/**
 * The Example class illustrates some of the Carapace functionalities
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Example extends Script
{
	/**
	 * {@inheritDoc}
	 */
	public function prepare()
	{
		echo 'test';
		$this->_configure();
		$this->_initialize();
	}

	/**
	 * Configures the script
	 */
	private function _configure()
	{
		// Sets the log handle and its directory
		$log_handle = new Collection\Log\Handle\Json();
		$log_handle->setDir(dirname(__DIR__) . '/var/log/');

		$this->log_handler->setHandle($log_handle);
	}

	/**
	 * Initializes the GUI
	 */
	private function _initialize()
	{
		$screen = new Frame();
		$screen->border();

		$panel = new Panel(8, 40, 2, 2);
		$panel->border();

		$cursor = new Cursor($panel);
		$cursor->write('This is a the main window. Press F1 to quit.');

		$screen->addFrame($panel);

		$this->select($screen);
	}

	/**
	 * {@inheritDoc}
	 */
	public function run($input)
	{
		switch ($input) {
			case Scanner::KEY_F1:
				$this->stop();
				break;
		}
	}
}

// Executes the test script
new Example();