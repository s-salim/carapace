<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Collection\Log\Handle;

use \Carapace\Core\Log;
use \Carapace\Core\Log\HandleInterface;
use \Carapace\Core\ScriptAbstract as Script;
use \Carapace\Tool\FileSystem\Explorer;

/**
 * Logs in Json format
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Json implements HandleInterface
{
	/**
	 * {@inheritDoc}
	 */
	protected $log;

	/**
	 * The log directory
	 *
	 * @var string
	 */
	protected $dir;

	/**
	 * @var string
	 */
	protected $date_time_format = 'y-m-d H:i:s';

	/**
	 * {@inheritDoc}
	 */
	public function handle()
	{
		if (!isset($this->dir)){
			return false;
		} else {
			$log = $this->log;
			$dir = $this->dir;
			$date_time_format = $this->date_time_format;
		}

		$script = Script::$instance;

		$write = function($channel) use ($log, $dir, $date_time_format)
		{
			if (is_null($channel)) return false;

			$file = $dir . $channel . '/' . date('d_m_Y') . '.log.json';

        	if (($contents = Explorer::exploreFile($file, true)) !== false){
        		if (empty($contents)){
        			$contents = array('[' . PHP_EOL);
        		} else {
		        	array_pop($contents);
		        	$contents[sizeof($contents) - 1] = str_replace(PHP_EOL, ',' . PHP_EOL, $contents[sizeof($contents) - 1]);
        		}
        	} else {
        		return false;
        	}

        	$log_entry = array(
				'datetime' => $log->getDateTime()->format($date_time_format),
				'code'     => $log->getCode(),
				'level'    => $log->getLevel(),
				'label'    => $log->getLabel(),
				'data'     => $log->getData(),
    		);

	        $log_output = str_replace('\u0000*\u0000', '', json_encode($log_entry));

	        $contents[] = "\t" . $log_output . PHP_EOL;
	        $contents[] = ']';

	        file_put_contents($file, implode($contents));
		};

        $write('all');
        $write(Log\Handler::$channels[$log->getLevel()]);
	}

	/**
	 * Get log
	 *
	 * @return \Carapace\Core\Log
	 */
	public function getLog()
	{
	    return $this->log;
	}
	
	/**
	 * Set log
	 *
	 * @param  \Carapace\Core\Log $log
	 * @return Json
	 */
	public function setLog(\Carapace\Core\Log $log)
	{
	    $this->log = $log;
	
	    return $this;
	}

	/**
	 * Get dir
	 *
	 * @return string
	 */
	public function getDir()
	{
	    return $this->dir;
	}
	
	/**
	 * Set dir
	 *
	 * @param  string $dir
	 * @return Json
	 */
	public function setDir($dir)
	{
	    $this->dir = $dir;
	
	    return $this;
	}

	/**
	 * Get date_time_format
	 *
	 * @return string
	 */
	public function getDateTimeFormat()
	{
	    return $this->date_time_format;
	}
	
	/**
	 * Set date_time_format
	 *
	 * @param  string $date_time_format
	 * @return Json
	 */
	public function setDateTimeFormat($date_time_format)
	{
	    $this->date_time_format = $date_time_format;
	
	    return $this;
	}
}