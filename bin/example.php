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
use \Carapace\Collection\Toolkit\ProgressBar;
use \Carapace\Collection;
use \Carapace\Core\GUI\Element;
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

		$this->register('progress_cursor', new Cursor($panel));

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

		$listener = new Listener(Scanner::KEY_F2, function() {
			Script::$instance->doSomeHardWork();
		});
	}

	public function doSomeHardWork()
	{
		$length = 10;

		$progress_bar = new ProgressBar($this->get('progress_cursor'), $length);

		for ($position = 0 ; $position < $length ; $position++){
			sleep(0.5);

			$progress_bar->display($position);
		}
	}
}

// Executes the test script
new Example();