<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core\Exception;

/**
 * Defines all exception handles
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
interface HandleInterface
{
	/**
	 * Handles the exception
	 */
	public function handle();

	/**
	 * Get exception
	 * 
	 * @return \Carapace\Core\Exception
	 */
	public function getException();

	/**
	 * Set exception
	 *
	 * @param  \Carapace\Core\Exception $exception
	 * @return HandleInterface
	 */
	public function setException(\Carapace\Core\Exception $exception);

}