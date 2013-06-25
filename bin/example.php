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
use \Carapace\Collection\GUI\Frame\Panel\ProgressBar;
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
	 * Available frames
	 * 
	 * @var array
	 */
	protected $frames = array();

	/**
	 * @var int
	 */
	protected $screen;

	/**
	 * @var int
	 */
	protected $panel;

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
		$screens = array();

		for ($i = 0; $i < 5; $i++){
			$screens[$i] = new Frame();
		}

		foreach ($screens as $key => $screen){
			$cursor = new Cursor($screen);

			for ($i = 0; $i < 25; $i++){
				$cursor->write('This is screen n°' . ($key + 1) . '. Press F1 to stop. Press LEFT and RIGHT to change screens. Press UP and DOWN to change panels. Press F2 to start doing some serious work. Press BACKSPACE for a flash.');
			}

			$this->frames[$key] = array(
				'screen' => $screen,
				'panels' => array(),
			);

			$panels = rand(2, 4);

			for ($i = 0; $i < $panels; $i++){
				$row    = $col = 4 + ($i * 2);
				$width  = 30;
				$height = 8;

				$panel = new Panel($height, $width, $row, $col);
				$panel->border();

				$this->frames[$key]['panels'][$i] = $panel;

				$screen->addFrame($panel);

				$cursor = new Cursor($panel);
				$cursor->write('This is panel n°' . ($i + 1) . ' of screen n°' . $key);
			}
		}

		$this->select($screens[0]);

		$this->screen = 0;
		$this->panel  = sizeof($this->frames[0]['panels']) - 1;
	}

	/**
	 * Create listeners
	 */
	private function _createListeners()
	{
		$listener = new Listener(Scanner::KEY_F1, function() {
			Script::$instance->stop();
		});

		$listener = new Listener(Scanner::KEY_BACKSPACE, function() {
			Script::$instance->getTerminal()->flash();
		});

		$listener = new Listener(Scanner::KEY_F2, function() {
			Script::$instance->doSomeHardWork();
		});

		$listener = new Listener(Scanner::KEY_UP, function() {
			Script::$instance->nextPanel();
		});

		$listener = new Listener(Scanner::KEY_DOWN, function() {
			Script::$instance->previousPanel();
		});

		$listener = new Listener(Scanner::KEY_RIGHT, function() {
			Script::$instance->nextScreen();
		});

		$listener = new Listener(Scanner::KEY_LEFT, function() {
			Script::$instance->previousScreen();
		});
	}

	public function doSomeHardWork()
	{
		$tasks = 30;

		$progress_bar = new ProgressBar($tasks, 4, 50, 2, 2);
		$progress_bar->setLabel('Hard Work');
		$progress_bar->border();
		$this->getFrame()->addFrame($progress_bar);
		$progress_bar->display();

		for ($position = 0 ; $position < $tasks ; $position++){
			sleep(1);

			$progress_bar->display($position, 'test-' . $position);
		}
	}

	public function nextPanel()
	{
		$this->panel = $this->panel + 1 === sizeof($this->frames[$this->screen]['panels']) ? 0 : $this->panel + 1;

		$this->apply();
	}

	public function previousPanel()
	{
		$this->panel = $this->panel === 0 ? sizeof($this->frames[$this->screen]['panels']) - 1 : $this->panel - 1;

		$this->apply();
	}

	public function nextScreen()
	{
		$this->screen = $this->screen + 1 === sizeof($this->frames) ? 0 : $this->screen + 1;
		$this->panel = sizeof($this->frames[$this->screen]['panels']) - 1;

		$this->apply();
	}

	public function previousScreen()
	{
		$this->screen = $this->screen === 0 ? sizeof($this->frames) - 1 : $this->screen - 1;
		$this->panel = sizeof($this->frames[$this->screen]['panels']) - 1;

		$this->apply();
	}

	public function apply()
	{
		$screen = $this->frames[$this->screen]['screen'];
		$this->select($screen);

		$panel = $this->frames[$this->screen]['panels'][$this->panel];
		$panel->top();
	}
}

// Executes the test script
new Example();