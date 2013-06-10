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

use \Carapace\Core\ScriptAbstract as Script;

/**
 * Represents a log entry
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Log
{
	/* Level constants */
	
	const LEVEL_INFO    = 0;
	const LEVEL_WARNING = 1;
	const LEVEL_ERROR   = 2;

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
	 * @var int
	 */
	protected $level;

	/**
	 * @var array
	 */
	protected $data;

	/**
	 * Constructor
	 * 
	 * @param int $code
	 * @param array  $data
	 * @param string $channel
	 */
	public function __construct($label, $code, $level, array $data = array())
	{
		$this->setDateTime(new \DateTime())
			 ->setLabel($label)
			 ->setCode($code)
			 ->setLevel($level)
			 ->setData($data);
		
		Script::$instance->getLogHandler()->handle($this);
	}

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
	 * Get level
	 *
	 * @return int
	 */
	public function getLevel()
	{
	    return $this->level;
	}
	
	/**
	 * Set level
	 *
	 * @param  int $level
	 * @return Log
	 */
	public function setLevel($level)
	{
	    $this->level = $level;
	
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