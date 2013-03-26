<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core;

/**
 * Represents an exception to be displayed
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Exception
{
	/**
	 * @var string
	 */
	protected $message;
	
	/**
	 * @var int
	 */
	protected $code;
	
	/**
	 * @var string
	 */
	protected $file;
	
	/**
	 * @var int
	 */
	protected $line;
	
	/**
	 * @var \Exception
	 */
	protected $previous;
	
	/**
	 * @var array
	 */
	protected $trace = array();

	/**
	 * Get message
	 *
	 * @return string
	 */
	public function getMessage()
	{
	    return $this->message;
	}
	
	/**
	 * Set message
	 *
	 * @param  string $message
	 * @return Exception
	 */
	public function setMessage($message)
	{
	    $this->message = $message;
	
	    return $this;
	}

	/**
	 * Get code
	 *
	 * @return int
	 */
	public function getCode()
	{
	    return $this->code;
	}
	
	/**
	 * Set code
	 *
	 * @param  int $code
	 * @return Exception
	 */
	public function setCode($code)
	{
	    $this->code = $code;
	
	    return $this;
	}

	/**
	 * Get file
	 *
	 * @return string
	 */
	public function getFile()
	{
	    return $this->file;
	}
	
	/**
	 * Set file
	 *
	 * @param  string $file
	 * @return Exception
	 */
	public function setFile($file)
	{
	    $this->file = $file;
	
	    return $this;
	}

	/**
	 * Get line
	 *
	 * @return int
	 */
	public function getLine()
	{
	    return $this->line;
	}
	
	/**
	 * Set line
	 *
	 * @param  int $line
	 * @return Exception
	 */
	public function setLine($line)
	{
	    $this->line = $line;
	
	    return $this;
	}

	/**
	 * Get previous
	 *
	 * @return \Exception
	 */
	public function getPrevious()
	{
	    return $this->previous;
	}
	
	/**
	 * Set previous
	 *
	 * @param  \Exception $previous
	 * @return Exception
	 */
	public function setPrevious($previous)
	{
	    $this->previous = $previous;
	
	    return $this;
	}

	/**
	 * Get trace
	 *
	 * @return array
	 */
	public function getTrace()
	{
	    return $this->trace;
	}
	
	/**
	 * Set trace
	 *
	 * @param  array $trace
	 * @return Exception
	 */
	public function setTrace(array $trace)
	{
	    $this->trace = $trace;
	
	    return $this;
	}
}