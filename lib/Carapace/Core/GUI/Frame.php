<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core\GUI;

/**
 * The basic element container
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Frame
{
	/**
	 * @var resource
	 */
	protected $ncurses_frame;
	
	/**
	 * @var resource
	 */
	protected $ncurses_panel;
	
	/**
	 * @var array
	 */
	protected $frames = array();
	
	/**
	 * @var \Carapace\Terminal\Scanner
	 */
	protected $scanner;
	
	/**
	 * @var boolean
	 */
	protected $visible = false;
	
	/**
	 * @var boolean
	 */
	protected $bordered = false;
	
	/**
	 * @var mixed
	 */
	protected $border_top = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_bottom = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_left = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_right = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_top_left = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_top_right = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_bottom_left = 0;
	
	/**
	 * @var mixed
	 */
	protected $border_bottom_right = 0;

	/**
	 * Borders the frame
	 * 	
	 * @param  boolean $top
	 * @param  boolean $bottom
	 * @param  boolean $left
	 * @param  boolean $right
	 * @param  boolean $top_left
	 * @param  boolean $top_right
	 * @param  boolean $bottom_left
	 * @param  boolean $bottom_right
	 * @return Frame
	 */
	public function border($top = null, $bottom = null, $left = null, $right = null, $top_left = null, $top_right = null, $bottom_left = null, $bottom_right = null)
	{

	}

	/**
	 * Clears the frame
	 * 
	 * @return Frame
	 */
	public function clear()
	{

	}

	/**
	 * Shows the frame
	 * 
	 * @return Frame
	 */
	public function show()
	{

	}

	/**
	 * Hides the frame
	 * 
	 * @return Frame
	 */
	public function hide()
	{

	}

	/**
	 * Puts the frame at the top of the stack
	 * 
	 * @return Frame
	 */
	public function top()
	{

	}

	/**
	 * Puts the frame at the bottom of the stack
	 * 
	 * @return Frame
	 */
	public function bottom()
	{

	}
}