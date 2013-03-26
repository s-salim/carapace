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

use \Carapace\Core\ScriptAbstract as Script;
use \Carapace\Core\Exception;

/**
 * Displays the exception in a screen
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Screen implements Exception\HandleInterface
{
	/**
	 * {@inheritDoc}
	 */
	protected $exception;

	/**
	 * The exception screen
	 *
	 * @var Exception\Screen
	 */
	protected $screen;

	/**
	 * {@inheritDoc}
	 */
	public function handle()
	{
		$this->screen->setException($this->exception);

		Script::$instance->select($this->screen);
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
	 * @return Screen
	 */
	public function setException(\Carapace\Core\Exception $exception)
	{
	    $this->exception = $exception;
	
	    return $this;
	}

	/**
	 * Get screen
	 *
	 * @return \Carapace\Core\Exception\ScreenAbstract
	 */
	public function getScreen()
	{
	    return $this->screen;
	}
	
	/**
	 * Set screen
	 *
	 * @param  \Carapace\Core\Exception\ScreenAbstract $screen
	 * @return Screen
	 */
	public function setScreen($screen)
	{
	    $this->screen = $screen;
	
	    return $this;
	}
}