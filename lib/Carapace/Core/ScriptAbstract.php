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

/**
 * Provides core script functionalities
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
abstract class ScriptAbstract
{
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
	 * Starts the script
	 */
	public function start()
	{

	}

	/**
	 * Stops the script
	 */
	public function stop()
	{

	}

	/**
	 * Selects the frame to display
	 * 
	 * @param  GUI\Frame $frame
	 * @return ScriptAbstract
	 */
	public function select(GUI\Frame $frame)
	{
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
	 * @return Script
	 */
	public function setInitialized($initialized)
	{
	    $this->initialized = $initialized;
	
	    return $this;
	}

	/**
	 * Get terminal
	 *
	 * @return Shell\Terminal
	 */
	public function getTerminal()
	{
	    return $this->terminal;
	}
	
	/**
	 * Set terminal
	 *
	 * @param  Shell\Terminal $terminal
	 * @return Shell\Terminal
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
	 * @return Script
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
	 * @return Script
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