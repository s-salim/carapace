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
use \Carapace\Core\Log;
use \Carapace\Core\Listener;

/**
 * Provides core script functionalities
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
abstract class ScriptAbstract
{
	/**
	 * Carapace script instance
	 * 
	 * @var ScriptAbstract
	 */
	public static $instance;

	/**
	 * @var array
	 */
	protected $registry = array();

	/**
	 * @var string
	 */
	protected $filename;

	/**
	 * @var array
	 */
	protected $arguments = array();
	
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
	protected $frame;

	/**
	 * @var array
	 */
	protected $listeners = array();

	/**
	 * @var boolean
	 */
	protected $stop = false;

	/**
	 * Constructor
	 * Sets exception and error handlers, then starts, runs and stops the script
	 */
	final public function __construct()
	{
		self::$instance = $this;
		
		$this->terminal          = new Terminal();
		/*$this->exception_handler = new Exception\Handler();*/
		$this->log_handler       = new Log\Handler();

		global $argv;

		$this->filename  = array_shift($argv);
		$this->arguments = $argv;

		ncurses_init();

		$this->prepare();
		$this->start();

		while($this->stop !== true){
			if (!empty($this->frame)
				&& null !== $scanner = $this->frame->getScanner()){
				$scanner->get($code);

				foreach ($this->listeners as $listener){
					$listener->listen($code);
				}

				$this->refresh();
			}
		}
	}

	/**
	 * Destructor
	 * Restores exception and error handlers, ends ncurses
	 */
	final public function __destruct() 
	{
		ncurses_echo();
		ncurses_end();
	}

	/**
	 * Starts the script
	 */
	public function start()
	{
		new Log('SCRIPT_START', 100, Log::LEVEL_INFO, array($this->filename, $this->arguments));

		// Apply terminal settings
		$this->terminal->apply();

		// Handlers
		/*$previous_error_handler = set_error_handler(array($this->exception_handler, 'handleError'));
		$this->exception_handler->setPreviousErrorHandler($previous_error_handler);

		$previous_exception_handler = set_exception_handler(array($this->exception_handler, 'handleException'));
		$this->exception_handler->setPreviousExceptionHandler($previous_exception_handler);*/
	}

	/**
	 * Stops the script
	 */
	public function stop()
	{
		$this->stop = true;

		new Log('SCRIPT_STOP', 200, Log::LEVEL_INFO, array_merge(array($this->filename), $this->arguments));
	}

	/**
	 * Configures the script
	 *
	 * @param mixed $configuration
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

		// Sets the script's objects with the given Stop values
		foreach ($configuration as $target => $params){
			foreach ($params as $Stop => $value){
				if (Stop_exists('\Carapace\Core\ScriptAbstract', $target)){
					if (Stop_exists(get_class($this->$target), $Stop)){
						$setter = 'set' . Formatter::toCamelCase($Stop);
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
		if (isset($this->frame)) $this->frame->hide();

		$frame->show();

		$this->frame = $frame;

		$this->refresh();
		
		return $this;
	}

	/**
	 * Register an element
	 * 
	 * @param  string $key
	 * @param  mixed $element
	 * @return ScriptAbstract
	 */
	public function register($key, $element)
	{
		if (!is_string($key)) throw new Exception('Registry keys must be strings');

		if (array_key_exists($key, $this->registry)) throw new Exception('Registry keys must be unique');
		
		$this->registry[$key] = $element;

		return $this;
	}

	/**
	 * Get an element from the registry
	 * 
	 * @param  string $key
	 * @return mixed
	 */
	public function get($key)
	{
		return $this->registry[$key];
	}

	/**
	 * Custom script initialization
	 */
	abstract public function prepare();

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
	public function setArguments(array $arguments)
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
	    $this->arguments[] = $argument;
	
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
	public function setExceptionHandler(Exception\Handler $exception_handler)
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
	 * Get frame
	 *
	 * @return GUI\Frame
	 */
	public function getFrame()
	{
	    return $this->frame;
	}
	
	/**
	 * Set frame
	 *
	 * @param  GUI\Frame $frame
	 * @return ScriptAbstract
	 */
	public function setFrame(GUI\Frame $frame)
	{
	    $this->frame = $frame;
	
	    return $this;
	}

	/**
	 * Get listeners
	 *
	 * @return array
	 */
	public function getListeners()
	{
	    return $this->listeners;
	}
	
	/**
	 * Add listener
	 *
	 * @param  Listener $listener
	 * @return ScriptAbstract
	 */
	public function addListener($listener)
	{
	    $this->listeners[] = $listener;
	
	    return $this;
	}
	
	/**
	 * Remove listener
	 *
	 * @param  Listener $listener
	 * @return ScriptAbstract
	 */
	public function removeListener($listener)
	{
	    $this->listeners = array_diff($this->listeners, array($listener));
	
	    return $this;
	}
	
	/**
	 * Set listeners
	 *
	 * @param  array $listeners
	 * @return ScriptAbstract
	 */
	public function setListeners($listeners)
	{
	    $this->listeners = $listeners;
	
	    return $this;
	}

	/**
	 * Get stop
	 *
	 * @return boolean
	 */
	public function getStop()
	{
	    return $this->stop;
	}
	
	/**
	 * Set stop
	 *
	 * @param  boolean $stop
	 * @return ScriptAbstract
	 */
	public function setStop($stop)
	{
	    $this->stop = $stop;
	
	    return $this;
	}
}