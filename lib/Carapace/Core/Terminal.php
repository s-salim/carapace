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
 * Provides terminal detection and configuration
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Terminal
{
	/**
	 * Keyboard input echo
	 * 
	 * @var boolean
	 */
	protected $echo   = false;
	
	/**
	 * Control char capture (ctrl+c, ctrl+z...)
	 * 
	 * @var boolean
	 */
	protected $raw    = false;
	
	/**
	 * Function key capture (arrow keys, F1, F2...)
	 * 
	 * @var boolean
	 */
	protected $keypad = true;
	
	/**
	 * Visible cursor
	 * 
	 * @var boolean
	 */
	protected $cursor = false;

	/**
	 * Colors
	 * 
	 * @var boolean
	 */
	protected $color  = true;

	/**
	 * Applies terminal settings
	 */
	public function apply()
	{
		
	}
}