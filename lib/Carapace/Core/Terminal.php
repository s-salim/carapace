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

	/**
	 * Flashes the terminal
	 * 
	 * @return Terminal
	 */
	public function flash()
	{
		return $this;
	}

	/**
	 * Checks for color support
	 * 
	 * @return boolean
	 */
	public function hasColors()
	{
		return $this;
	}

	/**
	 * Get echo
	 *
	 * @return boolean
	 */
	public function getEcho()
	{
	    return $this->echo;
	}
	
	/**
	 * Set echo
	 *
	 * @param  boolean $echo
	 * @return Terminal
	 */
	public function setEcho($echo)
	{
	    $this->echo = $echo;
	
	    return $this;
	}

	/**
	 * Get raw
	 *
	 * @return boolean
	 */
	public function getRaw()
	{
	    return $this->raw;
	}
	
	/**
	 * Set raw
	 *
	 * @param  boolean $raw
	 * @return Terminal
	 */
	public function setRaw($raw)
	{
	    $this->raw = $raw;
	
	    return $this;
	}

	/**
	 * Get keypad
	 *
	 * @return boolean
	 */
	public function getKeypad()
	{
	    return $this->keypad;
	}
	
	/**
	 * Set keypad
	 *
	 * @param  boolean $keypad
	 * @return Terminal
	 */
	public function setKeypad($keypad)
	{
	    $this->keypad = $keypad;
	
	    return $this;
	}

	/**
	 * Get cursor
	 *
	 * @return boolean
	 */
	public function getCursor()
	{
	    return $this->cursor;
	}
	
	/**
	 * Set cursor
	 *
	 * @param  boolean $cursor
	 * @return Terminal
	 */
	public function setCursor($cursor)
	{
	    $this->cursor = $cursor;
	
	    return $this;
	}

	/**
	 * Get color
	 *
	 * @return boolean
	 */
	public function getColor()
	{
	    return $this->color;
	}
	
	/**
	 * Set color
	 *
	 * @param  boolean $color
	 * @return Terminal
	 */
	public function setColor($color)
	{
	    $this->color = $color;
	
	    return $this;
	}
}