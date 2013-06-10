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
use \Carapace\Core\Listener;

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
		$this->_configure();
		$this->_createGUI();
		$this->_createListeners();
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
	private function _createGUI()
	{
		$screen = new Frame();
		$screen->border();

		$panel = new Panel(8, 40, 2, 2);
		$panel->border();

		$cursor = new Cursor($screen);

		for ($i = 0 ; $i < 50 ; $i++){
			$cursor->write('This the main window. Press F1 to quit. ');
		}

		$screen->addFrame($panel);

		$this->select($screen);
	}

	/**
	 * Create listeners
	 */
	private function _createListeners()
	{
		$listener = new Listener(Scanner::KEY_F1, function() {
			Script::$instance->stop();
		});
	}
}

// Executes the test script
new Example();