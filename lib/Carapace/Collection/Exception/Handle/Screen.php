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
 * Displays the exception in a screen
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Screen implements \Carapace\Core\Exception\HandleInterface
{
	/**
	 * {@inheritDoc}
	 */
	protected $exception;

	/**
	 * {@inheritDoc}
	 */
	abstract public function handle()
	{

	}
}