<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Collection\Log\Handle;

/**
 * Logs in text format
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Text implements \Carapace\Core\Log\HandleInterface
{
	/**
	 * {@inheritDoc}
	 */
	protected $log;

	/**
	 * {@inheritDoc}
	 */
	public function handle()
	{
		
	}

	/**
	 * Get log
	 *
	 * @return \Carapace\Core\Log
	 */
	public function getLog()
	{
	    return $this->log;
	}
	
	/**
	 * Set log
	 *
	 * @param  \Carapace\Core\Log $log
	 * @return Text
	 */
	public function setLog($log)
	{
	    $this->log = $log;
	
	    return $this;
	}
}