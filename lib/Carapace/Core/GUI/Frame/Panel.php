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
}