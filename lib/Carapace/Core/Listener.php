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
 * Waits for a specific input to trigger an event
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Listener
{
	/**
	 * @var int
	 */
	protected $triggers = array();

	/**
	 * @var callable
	 */
	protected $action;

	/**
	 * Constructor
	 * 
	 * @param array|int $triggers
	 * @param callable $action
	 */
	public function __construct($triggers, $action)
	{
		if (is_array($triggers)){
			$this->triggers = $triggers;
		} elseif (is_int($triggers)) {
			$this->triggers = array($triggers);
		} else {
			throw new Exception('Parameter "triggers" must be either an array or an integer');
			
		}

		$this->action  = $action;

		ScriptAbstract::$instance->addListener($this);
	}

	/**
	 * Listens to input
	 * 
	 * @param  int $code [description]
	 * @return boolean
	 */
	public function listen($code)
	{
		if (in_array($code, $this->triggers)){
			call_user_func($this->action);

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Set triggers
	 *
	 * @param  array $triggers
	 * @return Listener
	 */
	public function setTriggers(array $triggers)
	{
	    $this->triggers = $triggers;
	
	    return $this;
	}
	
	/**
	 * Add trigger
	 *
	 * @param  int $trigger
	 * @return Listener
	 */
	public function addTrigger($trigger)
	{
	    $this->triggers[] = $trigger;
	
	    return $this;
	}
	
	/**
	 * Remove trigger
	 *
	 * @param  int $trigger
	 * @return Listener
	 */
	public function removeTrigger($trigger)
	{
	    $this->triggers = array_diff($this->triggers, array($trigger));
	
	    return $this;
	}
}