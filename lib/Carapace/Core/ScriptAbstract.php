<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core;

use \Carapace\Tool\String\Formatter;

/**
 * Provides core script functionalities
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
abstract class ScriptAbstract
{
	/**
	 * @var string
	 */
	protected $filename;

	/**
	 * @var array
	 */
	protected $arguments = array();
	
	/**
	 * @var boolean
	 */
	protected $initialized = false;
	
	/**
	 * @var Terminal
	 */
	protected $terminal;
	
	/**
	 * @var Exception\Handler
	 */
	protected $exception_handler;
	
	/**
	 * @var Log\Handler
	 */
	protected $log_handler;

	/**
	 * @var GUI\Frame
	 */
	protected $selected_frame;

	/**
	 * Constructor
	 * Sets exception and error handlers, then starts, runs and stops the script
	 */
	final public function __construct()
	{
		$this->terminal          = new Terminal();
		$this->exception_handler = new Exception\Handler();
		$this->log_handler       = new Log\Handler();

		global $argv;

		$this->filename  = array_shift($argv);
		$this->arguments = $argv;

		$this->init();
		$this->start();

		while(true){
			$this->run();
		}
	}

	/**
	 * Destructor
	 * Restores exception and error handlers, ends ncurses
	 */
	final public function __destruct() 
	{
		restore_exception_handler();
		restore_error_handler();

		if ($this->initialized){
			ncurses_echo();
			ncurses_end();
		}
	}

	/**
	 * Starts the script
	 */
	public function start()
	{
		// Config
		$this->_configure();

		// Ncurses initialization
		ncurses_init();

		$this->initialized = true;

		// Apply terminal settings
		$this->terminal->apply();

		// Handlers
		set_error_handler($this->exception_handler, 'handleError');
		set_exception_handler($this->exception_handler, 'handleException');
	}

	/**
	 * Stops the script
	 */
	public function stop()
	{
		$this->__destruct();
	}

	/**
	 * Configures the script
	 */
	public function configure($configuration)
	{
		// If $configuration is a string, checks for an ini file
		if (is_string($configuration) && file_exists($configuration)){
			$configuration = parse_ini_file($configuration, true);
		}

		if (!is_array($configuration)){
			return;
		}

		// Sets the script's objects with the given property values
		foreach ($configuration as $target => $params){
			foreach ($params as $property => $value){
				if (property_exists('ScriptAbstract', $target)){
					if (property_exists(get_class($this->$target), $property)){
						$setter = 'set' . Formatter::toCamelCase($property);
						$this->$target->$setter($value);
					}
				}
			}
		}
	}

	/**
	 * Refreshes the screens
	 * 
	 * @return ScriptAbstract
	 */
	final public function refresh()
	{
		ncurses_update_panels();
		ncurses_doupdate();

		return $this;
	}

	/**
	 * Selects the frame to display
	 * 
	 * @param  GUI\Frame $frame
	 * @return ScriptAbstract
	 */
	public function select(GUI\Frame $frame)
	{
		if (isset($this->selected_frame)) $this->selected_frame->hide();

		$frame->show();

		$this->selected_frame = $frame;

		return $this;
	}

	/**
	 * Custom script initialization
	 */
	abstract public function init();

	/**
	 * Custom script execution
	 */
	abstract public function run();

	/**
	 * Get arguments
	 *
	 * @return array
	 */
	public function getArguments()
	{
	    return $this->arguments;
	}
	
	/**
	 * Set arguments
	 *
	 * @param  array $arguments
	 * @return ScriptAbstract
	 */
	public function setArguments($arguments)
	{
	    $this->arguments = $arguments;
	
	    return $this;
	}
	
	/**
	 * Add argument
	 *
	 * @param  int $argument
	 * @return ScriptAbstract
	 */
	public function addArgument($argument)
	{
	    $this->arguments[] = $attribute;
	
	    return $this;
	}
	
	/**
	 * Remove argument
	 *
	 * @param  int $argument
	 * @return ScriptAbstract
	 */
	public function removeArgument($argument)
	{
	    $this->arguments = array_diff($this->arguments, array($argument));
	
	    return $this;
	}

	/**
	 * Get initialized
	 *
	 * @return boolean
	 */
	public function getInitialized()
	{
	    return $this->initialized;
	}
	
	/**
	 * Set initialized
	 *
	 * @param  boolean $initialized
	 * @return ScriptAbstract
	 */
	public function setInitialized($initialized)
	{
	    $this->initialized = $initialized;
	
	    return $this;
	}

	/**
	 * Get terminal
	 *
	 * @return ScriptAbstract
	 */
	public function getTerminal()
	{
	    return $this->terminal;
	}
	
	/**
	 * Set terminal
	 *
	 * @param  Shell\Terminal $terminal
	 * @return ScriptAbstract
	 */
	public function setTerminal($terminal)
	{
	    $this->terminal = $terminal;
	
	    return $this;
	}

	/**
	 * Get exception_handler
	 *
	 * @return Exception\Handler
	 */
	public function getExceptionHandler()
	{
	    return $this->exception_handler;
	}
	
	/**
	 * Set exception_handler
	 *
	 * @param  Exception\Handler $exception_handler
	 * @return ScriptAbstract
	 */
	public function setExceptionHandler($exception_handler)
	{
	    $this->exception_handler = $exception_handler;
	
	    return $this;
	}

	/**
	 * Get log_handler
	 *
	 * @return Log\Handler
	 */
	public function getLogHandler()
	{
	    return $this->log_handler;
	}
	
	/**
	 * Set log_handler
	 *
	 * @param  Log\Handler $log_handler
	 * @return ScriptAbstract
	 */
	public function setLogHandler(Log\Handler $log_handler)
	{
	    $this->log_handler = $log_handler;
	
	    return $this;
	}

	/**
	 * Get selected_frame
	 *
	 * @return GUI\Frame
	 */
	public function getSelectedFrame()
	{
	    return $this->selected_frame;
	}
	
	/**
	 * Set selected_frame
	 *
	 * @param  GUI\Frame $selected_frame
	 * @return ScriptAbstract
	 */
	public function setSelectedFrame($selected_frame)
	{
	    $this->selected_frame = $selected_frame;
	
	    return $this;
	}
}