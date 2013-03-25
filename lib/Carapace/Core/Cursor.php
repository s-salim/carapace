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
	 * Moves the cursor
	 * 
	 * @param  int $row
	 * @param  int $col
	 * @return Cursor
	 */
	public function move($row = null, $col = null)
	{
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
	 * @param  Frame $frame
	 * @return Cursor
	 */
	public function setFrame(Frame $frame)
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
	public function setAttributes($attributes)
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