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
 * Represents a log entry
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Log
{
	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var \DateTime
	 */
	protected $datetime;

	/**
	 * @var int
	 */
	protected $code;

	/**
	 * @var array
	 */
	protected $data;
}