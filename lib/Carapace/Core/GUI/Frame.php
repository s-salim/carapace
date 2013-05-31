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

use Frame\Panel;
use \Carapace\Core\Terminal\Scanner;

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
	protected $ncurses_window;
	
	/**
	 * @var resource
	 */
	protected $ncurses_panel;
	
	/**
	 * @var array
	 */
	protected $frames = array();
	
	/**
	 * @var \Carapace\Core\Terminal\Scanner
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
	 * Constructor
	 */
	public function __construct()
	{
		$this->ncurses_window = ncurses_newwin(0, 0, 0, 0);
		$this->ncurses_panel  = ncurses_new_panel($this->ncurses_window);
		
		$this->scanner = new Scanner();

		$this->hide();
		$this->bottom();
	}

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
		if (!is_null($top))          $this->border_top          = $top;
		if (!is_null($bottom))       $this->border_bottom       = $bottom;
		if (!is_null($left))         $this->border_left         = $left;
		if (!is_null($right))        $this->border_right        = $right;
		if (!is_null($top_left))     $this->border_top_left     = $top_left;
		if (!is_null($top_right))    $this->border_top_right    = $top_right;
		if (!is_null($bottom_left))  $this->border_bottom_left  = $bottom_left;
		if (!is_null($bottom_right)) $this->border_bottom_right = $bottom_right;

this = $this>bordered = true;

		if ($this instanceof Panel){
			call_user_func_array('ncurses_wborder', array_merge(array($this->ncurses_window), $this->_getBorders()));
		} else {
			call_user_func_array('ncurses_border', $this->_getBorders());
		}
		
		return $this;
	}

	/**
	 * Returns all borders as an array
	 * 
	 * @return array
	 */
	private function _getBorders()
	{
		$borders = array();

		$borders[] = $this->border_top;
		$borders[] = $this->border_bottom;
		$borders[] = $this->border_left;
		$borders[] = $this->border_right;
		$borders[] = $this->border_top_left;
		$borders[] = $this->border_top_right;
		$borders[] = $this->border_bottom_left;
		$borders[] = $this->border_bottom_right;

		// Turns string border values into ASCII
		array_walk($borders, function(&$value){
			if (is_string($value)) $value = ord($value);
		});

		return $borders;
	}

	/**
	 * Clears the frame
	 * 
	 * @return Frame
	 */
	public function clear()
	{
		ncurses_wclear($this->ncurses_window);

		foreach ($this->frames as $frame){
			$frame->clear();
		}

		return $this;
	}

	/**
	 * Shows the frame
	 * 
	 * @return Frame
	 */
	public function show()
	{
		ncurses_show_panel($this->ncurses_panel);

		foreach ($this->frames as $frame){
			$frame->show();
		}

		$this->visible = true;

		return $this;
	}

	/**
	 * Hides the frame
	 * 
	 * @return Frame
	 */
	public function hide()
	{
		ncurses_hide_panel($this->ncurses_panel);

		foreach ($this->frames as $frame){
			$frame->hide();
		}

		$this->visible = false;

		return $this;
	}

	/**
	 * Puts the frame at the top of the stack
	 * 
	 * @return Frame
	 */
	public function top()
	{
		ncurses_top_panel($this->ncurses_panel);

		return $this;
	}

	/**
	 * Puts the frame at the bottom of the stack
	 * 
	 * @return Frame
	 */
	public function bottom()
	{
		ncurses_bottom_panel($this->ncurses_panel);

		return $this;
	}

	/**
	 * Get ncurses_window
	 *
	 * @return resource
	 */
	public function getNcursesWindow()
	{
	    return $this->ncurses_window;
	}
	
	/**
	 * Set ncurses_window
	 *
	 * @param  resource $ncurses_window
	 * @return Frame
	 */
	public function setNcursesWindow(resource $ncurses_window)
	{
	    $this->ncurses_window = $ncurses_window;
	
	    return $this;
	}

	/**
	 * Get ncurses_panel
	 *
	 * @return resource
	 */
	public function getNcursesPanel()
	{
	    return $this->ncurses_panel;
	}
	
	/**
	 * Set ncurses_panel
	 *
	 * @param  resource $ncurses_panel
	 * @return Frame
	 */
	public function setNcursesPanel($ncurses_panel)
	{
	    $this->ncurses_panel = $ncurses_panel;
	
	    return $this;
	}

	/**
	 * Get frames
	 *
	 * @return array
	 */
	public function getFrames()
	{
	    return $this->frames;
	}
	
	/**
	 * Set frames
	 *
	 * @param  array $frames
	 * @return Frame
	 */
	public function setFrames($frames)
	{
	    $this->frames = $frames;
	
	    return $this;
	}
	
	/**
	 * Add frame
	 *
	 * @param  Frame $frame
	 * @return Frame
	 */
	public function addFrame($frame)
	{
	    $this->frames[] = $frame;
	
	    return $this;
	}
	
	/**
	 * Remove frame
	 *
	 * @param  Frame $frame
	 * @return Frame
	 */
	public function removeFrame($frame)
	{
	    $this->frames = array_diff($this->attributes, array($frame));
	
	    return $this;
	}

	/**
	 * Get scanner
	 *
	 * @return \Carapace\Core\Terminal\Scanner
	 */
	public function getScanner()
	{
	    return $this->scanner;
	}
	
	/**
	 * Set scanner
	 *
	 * @param  \Carapace\Core\Terminal\Scanner $scanner
	 * @return Frame
	 */
	public function setScanner($scanner)
	{
	    $this->scanner = $scanner;
	
	    return $this;
	}

	/**
	 * Get visible
	 *
	 * @return boolean
	 */
	public function getVisible()
	{
	    return $this->visible;
	}
	
	/**
	 * Set visible
	 *
	 * @param  boolean $visible
	 * @return Frame
	 */
	public function setVisible($visible)
	{
	    $this->visible = $visible;
	
	    return $this;
	}

	/**
	 * Get bordered
	 *
	 * @return boolean
	 */
	public function getBordered()
	{
	    return $this->bordered;
	}
	
	/**
	 * Set bordered
	 *
	 * @param  boolean $bordered
	 * @return Frame
	 */
	public function setBordered($bordered)
	{
	    $this->bordered = $bordered;
	
	    return $this;
	}

	/**
	 * Get border_top
	 *
	 * @return mixed
	 */
	public function getBorderTop()
	{
	    return $this->border_top;
	}
	
	/**
	 * Set border_top
	 *
	 * @param  mixed $border_top
	 * @return Frame
	 */
	public function setBorderTop($border_top)
	{
	    $this->border_top = $border_top;
	
	    return $this;
	}

	/**
	 * Get border_bottom
	 *
	 * @return mixed
	 */
	public function getBorderBottom()
	{
	    return $this->border_bottom;
	}
	
	/**
	 * Set border_bottom
	 *
	 * @param  mixed $border_bottom
	 * @return Frame
	 */
	public function setBorderBottom($border_bottom)
	{
	    $this->border_bottom = $border_bottom;
	
	    return $this;
	}

	/**
	 * Get border_left
	 *
	 * @return mixed
	 */
	public function getBorderLeft()
	{
	    return $this->border_left;
	}
	
	/**
	 * Set border_left
	 *
	 * @param  mixed $border_left
	 * @return Frame
	 */
	public function setBorderLeft($border_left)
	{
	    $this->border_left = $border_left;
	
	    return $this;
	}

	/**
	 * Get border_right
	 *
	 * @return mixed
	 */
	public function getBorderRight()
	{
	    return $this->border_right;
	}
	
	/**
	 * Set border_right
	 *
	 * @param  mixed $border_right
	 * @return Frame
	 */
	public function setBorderRight($border_right)
	{
	    $this->border_right = $border_right;
	
	    return $this;
	}

	/**
	 * Get border_top_left
	 *
	 * @return mixed
	 */
	public function getBorderTopLeft()
	{
	    return $this->border_top_left;
	}
	
	/**
	 * Set border_top_left
	 *
	 * @param  mixed $border_top_left
	 * @return Frame
	 */
	public function setBorderTopLeft($border_top_left)
	{
	    $this->border_top_left = $border_top_left;
	
	    return $this;
	}

	/**
	 * Get border_top_right
	 *
	 * @return mixed
	 */
	public function getBorderTopRight()
	{
	    return $this->border_top_right;
	}
	
	/**
	 * Set border_top_right
	 *
	 * @param  mixed $border_top_right
	 * @return Frame
	 */
	public function setBorderTopRight($border_top_right)
	{
	    $this->border_top_right = $border_top_right;
	
	    return $this;
	}

	/**
	 * Get border_bottom_left
	 *
	 * @return mixed
	 */
	public function getBorderBottomLeft()
	{
	    return $this->border_bottom_left;
	}
	
	/**
	 * Set border_bottom_left
	 *
	 * @param  mixed $border_bottom_left
	 * @return Frame
	 */
	public function setBorderBottomLeft($border_bottom_left)
	{
	    $this->border_bottom_left = $border_bottom_left;
	
	    return $this;
	}

	/**
	 * Get border_bottom_right
	 *
	 * @return mixed
	 */
	public function getBorderBottomRight()
	{
	    return $this->border_bottom_right;
	}
	
	/**
	 * Set border_bottom_right
	 *
	 * @param  mixed $border_bottom_right
	 * @return Frame
	 */
	public function setBorderBottomRight($border_bottom_right)
	{
	    $this->border_bottom_right = $border_bottom_right;
	
	    return $this;
	}
}