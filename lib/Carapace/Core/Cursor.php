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
 * The cursor
 * 
 * @author Soufian Salim <soufi@nsal.im>
 */
class Cursor
{
	/* Character display constants */
	
	const ALT       = NCURSES_A_ALTCHARSET;
	const BLINK     = NCURSES_A_BLINK;
	const BOLD      = NCURSES_A_BOLD;
	const DIM       = NCURSES_A_DIM;
	const INVISIBLE = NCURSES_A_INVIS;
	const PROTECT   = NCURSES_A_PROTECT;
	const REVERSE   = NCURSES_A_REVERSE;
	const STANDOUT  = NCURSES_A_STANDOUT;
	const UNDERLINE = NCURSES_A_UNDERLINE;

	/* Color constants */
	
	const BLACK   = NCURSES_COLOR_BLACK;
	const BLUE    = NCURSES_COLOR_BLUE;
	const GREEN   = NCURSES_COLOR_GREEN;
	const CYAN    = NCURSES_COLOR_CYAN;
	const RED     = NCURSES_COLOR_RED;
	const MAGENTA = NCURSES_COLOR_MAGENTA;
	const YELLOW  = NCURSES_COLOR_YELLOW;
	const WHITE   = NCURSES_COLOR_WHITE;
	
	/**
	 * @var GUI\Frame
	 */
	protected $frame;

	/**
	 * @var int
	 */
	protected $row;

	/**
	 * @var int
	 */
	protected $col;

	/**
	 * @var array
	 */
	protected $attributes = array();

	/**
	 * Constructor
	 * 
	 * @param GUI\Frame $frame
	 */
	public function __construct(GUI\Frame $frame)
	{
		$this->frame = $frame;

		ncurses_getyx($this->frame->getNcursesWindow(), $this->row, $this->col);
	}

	/**
	 * Moves the cursor
	 * 
	 * @param  int $row
	 * @param  int $col
	 * @return Cursor
	 */
	public function move($row = null, $col = null)
	{
		$row = is_null($row) ? $this->row : $row;
		$col = is_null($col) ? $this->col : $col;

		ncurses_wmove($this->frame->getNcursesWindow(), $row, $col);
		ncurses_getyx($this->frame->getNcursesWindow(), $this->row, $this->col);

		return $this;
	}

	/**
	 * Writes a string at the given position
	 * 
	 * @param  string $string
	 * @param  int $row
	 * @param  int $col
	 * @return Cursor
	 */
	public function write($string, $row = null, $col = null)
	{
		foreach ($this->attributes as $attribute){
			ncurses_attron($attribute);
		}

		$this->move($row, $col);

		$win = $this->frame->getNcursesWindow();

		if ($this->frame->getBordered()){
			foreach (str_split($string) as $char){
				ncurses_getyx($win, $y, $x);

				if ($x === 0){
					$x++;
				} elseif ($x === ($this->frame->getWidth() - 1)){
					$x = 1; 
					$y++;
				}

				if ($y === 0){
					$y++;
				} elseif ($y === ($this->frame->getHeight() -1)){
					// TODO : scrollbar
					break;
				}

				ncurses_wmove($win, $y, $x);
				ncurses_waddch($win, ord($char));
			}
		} else {
			ncurses_waddstr($win, $string);
		}

		foreach ($this->attributes as $attribute){
			ncurses_attroff($attribute);
		}

		ncurses_getyx($this->frame->getNcursesWindow(), $this->row, $this->col);

		return $this;
	}

	/**
	 * Get frame
	 *
	 * @return Frame
	 */
	public function getFrame()
	{
	    return $this->frame;
	}
	
	/**
	 * Set frame
	 *
	 * @param  GUI\Frame $frame
	 * @return Cursor
	 */
	public function setFrame(GUI\Frame $frame)
	{
	    $this->frame = $frame;
	
	    return $this;
	}

	/**
	 * Get row
	 *
	 * @return int
	 */
	public function getRow()
	{
	    return $this->row;
	}
	
	/**
	 * Set row
	 *
	 * @param  int $row
	 * @return Cursor
	 */
	public function setRow($row)
	{
	    $this->row = $row;
	
	    return $this;
	}

	/**
	 * Get col
	 *
	 * @return int
	 */
	public function getCol()
	{
	    return $this->col;
	}
	
	/**
	 * Set col
	 *
	 * @param  int $col
	 * @return Cursor
	 */
	public function setCol($col)
	{
	    $this->col = $col;
	
	    return $this;
	}

	/**
	 * Get attributes
	 *
	 * @return array
	 */
	public function getAttributes()
	{
	    return $this->attributes;
	}
	
	/**
	 * Set attributes
	 *
	 * @param  Array $attributes
	 * @return Cursor
	 */
	public function setAttributes(array $attributes)
	{
	    $this->attributes = $attributes;
	
	    return $this;
	}
	
	/**
	 * Add attribute
	 *
	 * @param  int $attribute
	 * @return Cursor
	 */
	public function addAttribute($attribute)
	{
	    $this->attributes[] = $attribute;
	
	    return $this;
	}
	
	/**
	 * Remove attribute
	 *
	 * @param  int $attribute
	 * @return Cursor
	 */
	public function removeAttribute($attribute)
	{
	    $this->attributes = array_diff($this->attributes, array($attribute));
	
	    return $this;
	}
}