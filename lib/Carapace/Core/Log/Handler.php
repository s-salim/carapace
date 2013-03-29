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

use \Carapace\Core\Log;

/**
 * Handle logging requests
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Handler
{
	public static $channels = array(
		Log::LEVEL_INFO    => 'info',
		Log::LEVEL_WARNING => 'warning',
		Log::LEVEL_ERROR   => 'error',
	);

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
	public function handle(\Carapace\Core\Log $log)
	{
		if (empty($this->handle)) return;
		
		$this->handle->setLog($log);
		$this->handle->handle();
	}

	/**
	 * Get handle
	 *
	 * @return HandleInterface
	 */
	public function getHandle()
	{
	    return $this->handle;
	}
	
	/**
	 * Set handle
	 *
	 * @param  HandleInterface $handle
	 * @return Handler
	 */
	public function setHandle(HandleInterface $handle)
	{
	    $this->handle = $handle;
	
	    return $this;
	}
}