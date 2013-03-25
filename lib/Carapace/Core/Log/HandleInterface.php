<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core\Log;

/**
 * Defines all log interfaces
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
interface HandleInterface
{
	/**
	 * The log
	 * 
	 * @var \Carapace\Log
	 */
	protected $log;

	/**
	 * Handles the log
	 */
	public function handle();
}