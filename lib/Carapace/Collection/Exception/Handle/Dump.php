<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Collection\Exception\Handle;

/**
 * Prints the exception
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Dump implements \Carapace\Core\Exception\HandleInterface
{
	/**
	 * {@inheritDoc}
	 */
	protected $exception;

	/**
	 * {@inheritDoc}
	 */
	public function handle()
	{
		
	}

	/**
	 * Get exception
	 *
	 * @return \Carapace\Core\Exception
	 */
	public function getException()
	{
	    return $this->exception;
	}
	
	/**
	 * Set exception
	 *
	 * @param  \Carapace\Core\Exception $exception
	 * @return Dump
	 */
	public function setException($exception)
	{
	    $this->exception = $exception;
	
	    return $this;
	}
}