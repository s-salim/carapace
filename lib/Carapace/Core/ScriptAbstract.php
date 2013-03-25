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
	 */
	public function select(GUI\Frame $frame)
	{
		
	}

	/**
	 * Custom script initialization
	 */
	abstract public function init();

	/**
	 * Custom script execution
	 */
	abstract public function run();
}