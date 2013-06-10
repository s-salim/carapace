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

use \Carapace\Core\ScriptAbstract as Script;
use \Carapace\Core\Exception;
use \Carapace\Core\Log;

/**
 * Handle exceptions
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Handler
{
	public static $error_levels = array(
		1     => E_ERROR,
		2     => E_WARNING,
		4     => E_PARSE,
		8     => E_NOTICE,
		16    => E_CORE_ERROR,
		32    => E_CORE_WARNING,
		64    => E_COMPILE_ERROR,
		128   => E_COMPILE_WARNING,
		256   => E_USER_ERROR,
		512   => E_USER_WARNING,
		1024  => E_USER_NOTICE,
		2048  => E_STRICT,
		4096  => E_RECOVERABLE_ERROR,
		8192  => E_DEPRECATED,
		16384 => E_USER_DEPRECATED,
		32767 => E_ALL,
	);

	/**
	 * The handle
	 * 
	 * @var HandleInterface
	 */
	protected $handle;

	/**
	 * @var callable
	 */
	protected $previous_exception_handler;
	
	/**
	 * @var callable
	 */
	protected $previous_error_handler;

	/**
	 * Sets the handle exception and calls its handle function, from an exception
	 * 
	 * @param \Exception $exception
	 */
	public function handleException(\Exception $exception)
	{
		Script::$instance->stop();

		if (empty($this->handle)){
			ncurses_echo();
			ncurses_end();
			call_user_func_array($this->previous_exception_handler, func_get_args());
		} else {
			new Log('EXCEPTION', 2, Log::LEVEL_ERROR, array(
				$exception->getMessage(),
				$exception->getCode(),
				$exception->getFile(),
				$exception->getLine(),
				$exception->getPrevious(),
				$exception->getTrace(),
			));

			$this->handle->setException($exception);
			$this->handle->handle();
		}
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
	public function handleError($level, $message, $file = null, $line = null, array $context = null)
	{
		if (empty($this->handle())){
			ncurses_echo();
			ncurses_end();
			call_user_func_array($this->previous_error_handler, func_get_args());
		} else {
			throw new \ErrorException($message, $level, 0, $file, $line);
		}
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

	/**
	 * Get previous_exception_handler
	 *
	 * @return callable
	 */
	public function getPreviousExceptionHandler()
	{
	    return $this->previous_exception_handler;
	}
	
	/**
	 * Set previous_exception_handler
	 *
	 * @param  callable $previous_exception_handler
	 * @return Handler
	 */
	public function setPreviousExceptionHandler($previous_exception_handler)
	{
	    $this->previous_exception_handler = $previous_exception_handler;
	
	    return $this;
	}

	/**
	 * Get previous_error_handler
	 *
	 * @return callable
	 */
	public function getPreviousErrorHandler()
	{
	    return $this->previous_error_handler;
	}
	
	/**
	 * Set previous_error_handler
	 *
	 * @param  callable $previous_error_handler
	 * @return Handler
	 */
	public function setPreviousErrorHandler($previous_error_handler)
	{
	    $this->previous_error_handler = $previous_error_handler;
	
	    return $this;
	}
}