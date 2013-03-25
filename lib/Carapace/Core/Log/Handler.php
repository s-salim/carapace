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
 * Handle logging requests
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
	public function setHandle($handle)
	{
	    $this->handle = $handle;
	
	    return $this;
	}
}