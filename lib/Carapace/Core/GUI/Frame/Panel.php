<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core\GUI\Frame;

/**
 * The basic "box" element
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Panel 
{
	/**
	 * @var \Carapace\Core\GUI\Frame
	 */
	protected $frame;
	
	/**
	 * @var int
	 */
	protected $height;
	
	/**
	 * @var int
	 */
	protected $width;
	
	/**
	 * @var int
	 */
	protected $row;

	/**
	 * @var int
	 */
	protected $col;

	/**
	 * Resizes the panel
	 * 
	 * @param  int $height
	 * @param  int $width
	 * @return Panel
	 */
	public function resize($height, $width)
	{

	}

	/**
	 * Moves the panel
	 * 
	 * @param  int $row
	 * @param  int $col
	 */
	public function move($row, $col)
	{

	}

	/**
	 * Get width
	 *
	 * @return int
	 */
	public function getWidth()
	{
	    return $this->width;
	}
	
	/**
	 * Set width
	 *
	 * @param  int $width
	 * @return Panel
	 */
	public function setWidth($width)
	{
	    $this->width = $width;
	
	    return $this;
	}

	/**
	 * Get height
	 *
	 * @return int
	 */
	public function getHeight()
	{
	    return $this->height;
	}
	
	/**
	 * Set height
	 *
	 * @param  int $height
	 * @return Panel
	 */
	public function setHeight($height)
	{
	    $this->height = $height;
	
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
	 * @return Panel
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
	 * @return Panel
	 */
	public function setCol($col)
	{
	    $this->col = $col;
	
	    return $this;
	}
}