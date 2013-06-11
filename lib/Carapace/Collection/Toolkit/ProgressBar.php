<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Collection\Toolkit;

use \Carapace\Core\Cursor;

/**
 * The progress bar
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class ProgressBar
{
	/**
	 * @var Cursor
	 */
	public $cursor;

	/**
	 * @var int
	 */
	public $start_time;

	/**
	 * @var string
	 */
	public $label;

	/**
	 * @var int
	 */
	public $length;

	/**
	 * @var string
	 */
	public $symbol_start = '[';

	/**
	 * @var string
	 */
	public $symbol_end = ']';

	/**
	 * @var string
	 */
	public $symbol_position = '.';

	/**
	 * @var string
	 */
	public $symbol_completed = 'X';

	/**
	 * @var string
	 */
	public $symbol_remaining = '.';

	/**
	 * Constructor
	 * 
	 * @param int $length
	 * @param string $label
	 */
	public function __construct(Cursor $cursor, $length, $label = null)
	{
		$this->start_time = time();
		$this->cursor    = $cursor;
		$this->label     = $label;
		$this->length     = $length;
	}

	/**
	 * Displays the progress bar
	 * 
	 * @param  int $position
	 */
	protected function display($position)
	{
		$this->cursor->write($position . '/' . $this->total);
	}
}