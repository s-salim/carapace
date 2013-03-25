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
 * Handle exceptions
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Handler
{
	/**
	 * The handle
	 * 
	 * @var HandleInterface
	 */
	protected $handle;

	/**
	 * Sets the handle log and calls its handle function
	 * 
	 * @param \Carapace\Log $log
	 */
	public function handle(\Carapace\Log $log)
	{

	}

	/**
	 * Sets the handle exception and calls its handle function, from an exception
	 * 
	 * @param \Exception $exception
	 */
	public function handleException(\Exception $exception)
	{

	}

	/**
	 * Sets the handle exception and calls its handle function, from an error
	 * 
	 * @param int    $level
	 * @param string $message
	 * @param string $file
	 * @param int    $line
	 * @param array  $context
	 */
	public function handleError($level, $message, $file, $line, array $context)
	{

	}
}