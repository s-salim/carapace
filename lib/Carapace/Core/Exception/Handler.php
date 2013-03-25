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
	 * Sets the handle exception and calls its handle function, from an exception
	 * 
	 * @param \Exception $exception
	 */
	public function handleException(\Exception $exception)
	{
		if (!$exception instanceof \Carapace\Core\Exception){
			$exception = new \Carapace\Core\Exception();
			$exception->setMessage($exception->getMessage())
					  ->setCode($exception->getCode())
					  ->setFile($exception->getFile())
					  ->setLine($exception->getLine())
					  ->setPrevious($exception->getPrevious())
					  ->setTrace($exception->getTrace());
		}

		$this->handle->setException($exception);
		$this->handle->handle();
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
		$exception = new \Carapace\Core\Exception();
		$exception->setMessage($message)
				  ->setCode($level)
				  ->setFile($file)
				  ->setLine($line)
				  ->setTrace($context);

		$this->handleException($exception);
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