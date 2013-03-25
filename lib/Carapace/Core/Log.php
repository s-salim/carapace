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
 * Represents a log entry
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Log
{
	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var \DateTime
	 */
	protected $datetime;

	/**
	 * @var int
	 */
	protected $code;

	/**
	 * @var array
	 */
	protected $data;

	/**
	 * Get label
	 *
	 * @return string
	 */
	public function getLabel()
	{
	    return $this->label;
	}
	
	/**
	 * Set label
	 *
	 * @param  string $label
	 * @return Log
	 */
	public function setLabel($label)
	{
	    $this->label = $label;
	
	    return $this;
	}

	/**
	 * Get datetime
	 *
	 * @return \DateTime
	 */
	public function getDateTime()
	{
	    return $this->datetime;
	}
	
	/**
	 * Set datetime
	 *
	 * @param  \DateTime $datetime
	 * @return Log
	 */
	public function setDateTime($datetime)
	{
	    $this->datetime = $datetime;
	
	    return $this;
	}

	/**
	 * Get code
	 *
	 * @return string
	 */
	public function getCode()
	{
	    return $this->code;
	}
	
	/**
	 * Set code
	 *
	 * @param  string $code
	 * @return Log
	 */
	public function setCode($code)
	{
	    $this->code = $code;
	
	    return $this;
	}

	/**
	 * Get data
	 *
	 * @return array
	 */
	public function getData()
	{
	    return $this->data;
	}
	
	/**
	 * Set data
	 *
	 * @param  array $data
	 * @return Log
	 */
	public function setData(array $data)
	{
	    $this->data = $data;
	
	    return $this;
	}
}