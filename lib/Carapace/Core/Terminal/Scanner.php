<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Core\Terminal;

/**
 * Handles mouse and keyboard input
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Scanner
{
	/* Keyboard constants */
	
	const KEY_F1        = NCURSES_KEY_F1;
	const KEY_F2        = NCURSES_KEY_F2;
	const KEY_F3        = NCURSES_KEY_F3;
	const KEY_F4        = NCURSES_KEY_F4;
	const KEY_F5        = NCURSES_KEY_F5;
	const KEY_F6        = NCURSES_KEY_F6;
	const KEY_F7        = NCURSES_KEY_F7;
	const KEY_F8        = NCURSES_KEY_F8;
	const KEY_F9        = NCURSES_KEY_F9;
	const KEY_F10       = NCURSES_KEY_F10;
	const KEY_F11       = NCURSES_KEY_F11;
	const KEY_F12       = NCURSES_KEY_F12;
	const KEY_DOWN      = NCURSES_KEY_DOWN;
	const KEY_UP        = NCURSES_KEY_UP;
	const KEY_LEFT      = NCURSES_KEY_LEFT;
	const KEY_RIGHT     = NCURSES_KEY_RIGHT;
	const KEY_HOME      = NCURSES_KEY_HOME;
	const KEY_BACKSPACE = NCURSES_KEY_BACKSPACE;
	const KEY_DL        = NCURSES_KEY_DL;
	const KEY_IL        = NCURSES_KEY_IL;
	const KEY_DC        = NCURSES_KEY_DC;
	const KEY_IC        = NCURSES_KEY_IC;
	const KEY_EIC       = NCURSES_KEY_EIC;
	const KEY_CLEAR     = NCURSES_KEY_CLEAR;
	const KEY_EOS       = NCURSES_KEY_EOS;
	const KEY_EOL       = NCURSES_KEY_EOL;
	const KEY_SF        = NCURSES_KEY_SF;
	const KEY_SR        = NCURSES_KEY_SR;
	const KEY_NPAGE     = NCURSES_KEY_NPAGE;
	const KEY_PPAGE     = NCURSES_KEY_PPAGE;
	const KEY_STAB      = NCURSES_KEY_STAB;
	const KEY_CTAB      = NCURSES_KEY_CTAB;
	const KEY_CATAB     = NCURSES_KEY_CATAB;
	const KEY_SRESET    = NCURSES_KEY_SRESET;
	const KEY_RESET     = NCURSES_KEY_RESET;
	const KEY_PRINT     = NCURSES_KEY_PRINT;
	const KEY_LL        = NCURSES_KEY_LL;
	const KEY_A1        = NCURSES_KEY_A1;
	const KEY_A3        = NCURSES_KEY_A3;
	const KEY_B2        = NCURSES_KEY_B2;
	const KEY_C1        = NCURSES_KEY_C1;
	const KEY_C3        = NCURSES_KEY_C3;
	const KEY_BTAB      = NCURSES_KEY_BTAB;
	const KEY_BEG       = NCURSES_KEY_BEG;
	const KEY_CANCEL    = NCURSES_KEY_CANCEL;
	const KEY_CLOSE     = NCURSES_KEY_CLOSE;
	const KEY_COMMAND   = NCURSES_KEY_COMMAND;
	const KEY_COPY      = NCURSES_KEY_COPY;
	const KEY_CREATE    = NCURSES_KEY_CREATE;
	const KEY_END       = NCURSES_KEY_END;
	const KEY_EXIT      = NCURSES_KEY_EXIT;
	const KEY_FIND      = NCURSES_KEY_FIND;
	const KEY_HELP      = NCURSES_KEY_HELP;
	const KEY_MARK      = NCURSES_KEY_MARK;
	const KEY_MESSAGE   = NCURSES_KEY_MESSAGE;
	const KEY_MOVE      = NCURSES_KEY_MOVE;
	const KEY_NEXT      = NCURSES_KEY_NEXT;
	const KEY_OPEN      = NCURSES_KEY_OPEN;
	const KEY_OPTIONS   = NCURSES_KEY_OPTIONS;
	const KEY_PREVIOUS  = NCURSES_KEY_PREVIOUS;
	const KEY_REDO      = NCURSES_KEY_REDO;
	const KEY_REFERENCE = NCURSES_KEY_REFERENCE;
	const KEY_REFRESH   = NCURSES_KEY_REFRESH;
	const KEY_REPLACE   = NCURSES_KEY_REPLACE;
	const KEY_RESTART   = NCURSES_KEY_RESTART;
	const KEY_RESUME    = NCURSES_KEY_RESUME;
	const KEY_SAVE      = NCURSES_KEY_SAVE;
	const KEY_SBEG      = NCURSES_KEY_SBEG;
	const KEY_SCANCEL   = NCURSES_KEY_SCANCEL;
	const KEY_SCOMMAND  = NCURSES_KEY_SCOMMAND;
	const KEY_SCOPY     = NCURSES_KEY_SCOPY;
	const KEY_SCREATE   = NCURSES_KEY_SCREATE;
	const KEY_SDC       = NCURSES_KEY_SDC;
	const KEY_SDL       = NCURSES_KEY_SDL;
	const KEY_SELECT    = NCURSES_KEY_SELECT;
	const KEY_SEND      = NCURSES_KEY_SEND;
	const KEY_SEOL      = NCURSES_KEY_SEOL;
	const KEY_SEXIT     = NCURSES_KEY_SEXIT;
	const KEY_SFIND     = NCURSES_KEY_SFIND;
	const KEY_SHELP     = NCURSES_KEY_SHELP;
	const KEY_SHOME     = NCURSES_KEY_SHOME;
	const KEY_SIC       = NCURSES_KEY_SIC;
	const KEY_SLEFT     = NCURSES_KEY_SLEFT;
	const KEY_SMESSAGE  = NCURSES_KEY_SMESSAGE;
	const KEY_SMOVE     = NCURSES_KEY_SMOVE;
	const KEY_SNEXT     = NCURSES_KEY_SNEXT;
	const KEY_SOPTIONS  = NCURSES_KEY_SOPTIONS;
	const KEY_SPREVIOUS = NCURSES_KEY_SPREVIOUS;
	const KEY_SPRINT    = NCURSES_KEY_SPRINT;
	const KEY_SREDO     = NCURSES_KEY_SREDO;
	const KEY_SREPLACE  = NCURSES_KEY_SREPLACE;
	const KEY_SRIGHT    = NCURSES_KEY_SRIGHT;
	const KEY_SRSUME    = NCURSES_KEY_SRSUME;
	const KEY_SSAVE     = NCURSES_KEY_SSAVE;
	const KEY_SSUSPEND  = NCURSES_KEY_SSUSPEND;
	const KEY_UNDO      = NCURSES_KEY_UNDO;
	const KEY_MOUSE     = NCURSES_KEY_MOUSE;

	/* Mouse constants */

	const MOUSE_1_RELEASED       = NCURSES_BUTTON1_RELEASED;
	const MOUSE_2_RELEASED       = NCURSES_BUTTON2_RELEASED;
	const MOUSE_3_RELEASED       = NCURSES_BUTTON3_RELEASED;
	const MOUSE_4_RELEASED       = NCURSES_BUTTON4_RELEASED;
	const MOUSE_1_PRESSED        = NCURSES_BUTTON1_PRESSED;
	const MOUSE_2_PRESSED        = NCURSES_BUTTON2_PRESSED;
	const MOUSE_3_PRESSED        = NCURSES_BUTTON3_PRESSED;
	const MOUSE_4_PRESSED        = NCURSES_BUTTON4_PRESSED;
	const MOUSE_1_CLICKED        = NCURSES_BUTTON1_CLICKED;
	const MOUSE_2_CLICKED        = NCURSES_BUTTON2_CLICKED;
	const MOUSE_3_CLICKED        = NCURSES_BUTTON3_CLICKED;
	const MOUSE_4_CLICKED        = NCURSES_BUTTON4_CLICKED;
	const MOUSE_1_DOUBLE_CLICKED = NCURSES_BUTTON1_DOUBLE_CLICKED;
	const MOUSE_2_DOUBLE_CLICKED = NCURSES_BUTTON2_DOUBLE_CLICKED;
	const MOUSE_3_DOUBLE_CLICKED = NCURSES_BUTTON3_DOUBLE_CLICKED;
	const MOUSE_4_DOUBLE_CLICKED = NCURSES_BUTTON4_DOUBLE_CLICKED;
	const MOUSE_1_TRIPLE_CLICKED = NCURSES_BUTTON1_TRIPLE_CLICKED;
	const MOUSE_2_TRIPLE_CLICKED = NCURSES_BUTTON2_TRIPLE_CLICKED;
	const MOUSE_3_TRIPLE_CLICKED = NCURSES_BUTTON3_TRIPLE_CLICKED;
	const MOUSE_4_TRIPLE_CLICKED = NCURSES_BUTTON4_TRIPLE_CLICKED;
	const MOUSE_CTRL             = NCURSES_BUTTON_CTRL;
	const MOUSE_SHIFT            = NCURSES_BUTTON_SHIFT;
	const MOUSE_ALT              = NCURSES_BUTTON_ALT;
	const ALL_MOUSE_EVENTS       = NCURSES_ALL_MOUSE_EVENTS;
	const REPORT_MOUSE_POSITION  = NCURSES_REPORT_MOUSE_POSITION;

	/**
	 * Whether mouse events are scanned or not
	 *
	 * @var boolean;
	 */
	protected $mouse_events = true;

	/**
	 * Characters that end the scan
	 * 
	 * @var array
	 */
	protected $return_chars = array();

	/**
	 * Characters ignored from the scan
	 * 
	 * @var array
	 */
	protected $ignored_chars = array();

	/**
	 * Maximum number of registered events
	 * 
	 * @var int
	 */
	protected $max_events;

	/**
	 * Maximum number of returned characters
	 * 
	 * @var int
	 */
	protected $max_chars;

	/**
	 * Maximum duration of the scan
	 * 
	 * @var int
	 */
	protected $max_time;

	/**
	 * Returns the mouse coordinates
	 * 
	 * @param  int $x
	 * @param  int $y
	 * @return Scanner
	 */
	public function mouse(&$x, &$y)
	{
		ncurses_getmouse($event);

		$x = $event['x'];
		$y = $event['y'];

		return $this;
	}

	/**
	 * Scans and returns input
	 *
	 * @param  string $string
	 * @param  array  $codes
	 * @return Scanner
	 */
	public function scan(&$string = '', &$codes = array())
	{
		$time    = time();
		$counter = 0;

		do {
			$input = ncurses_getch();

			if (!in_array($input, $this->ignored_chars)
				&& !in_array($input, $this->return_chars)
				&& ($this->mouse_events === true
					|| $input !== self::KEY_MOUSE)){
				$codes[] = $input;
				$string .= chr($input);
			}

			$counter++;
		} while ((!empty($this->return_chars)
				&& !in_array($code, $this->return_chars))
			&& (empty($this->max_chars)
				|| strlen($string) < $this->max_chars)
			&& (empty($this->max_events)
				|| $counter < $this->max_events)
			&& (empty($this->max_time)
				|| time() - $time < $this->max_time));

		return $this;
	}

	/**
	 * Scans and returns the next valid input
	 *
	 * @param  int    $code
	 * @param  string $char
	 * @return Scanner
	 */
	public function get(&$code = null, &$char = '')
	{
		$time    = time();
		$counter = 0;

		do {
			$code = ncurses_getch();
			$char = chr($code);

			$counter++;
		} while((!empty($this->return_chars)
				&& !in_array($code, $this->return_chars))
			&& (empty($this->max_events)
				|| $counter < $this->max_events)
			&& (empty($this->max_time)
				|| time() - $time < $this->max_time)
			&& ($this->mouse_events === true
				|| $code !== self::KEY_MOUSE));

		return $this;
	}

	/**
	 * Get mouse_events
	 *
	 * @return boolean
	 */
	public function getMouseEvents()
	{
	    return $this->mouse_events;
	}
	
	/**
	 * Set mouse_events
	 *
	 * @param  boolean $mouse_events
	 * @return Scanner
	 */
	public function setMouseEvents($mouse_events)
	{
	    $this->mouse_events = $mouse_events;
	
	    return $this;
	}

	/**
	 * Get return_chars
	 *
	 * @return array
	 */
	public function getReturnChars()
	{
	    return $this->return_chars;
	}
	
	/**
	 * Set return_chars
	 *
	 * @param  array $return_chars
	 * @return Scanner
	 */
	public function setReturnChars(array $return_chars)
	{
	    $this->return_chars = $return_chars;
	
	    return $this;
	}
	
	/**
	 * Add return_char
	 *
	 * @param  int $return_char
	 * @return Scanner
	 */
	public function addReturnChar($return_char)
	{
	    $this->return_chars[] = $return_char;
	
	    return $this;
	}
	
	/**
	 * Remove return_char
	 *
	 * @param  int $return_char
	 * @return Scanner
	 */
	public function removeReturnChar($return_char)
	{
	    $this->return_chars = array_diff($this->return_chars, array($return_char));
	
	    return $this;
	}

	/**
	 * Get ignored_chars
	 *
	 * @return array
	 */
	public function getIgnoredChars()
	{
	    return $this->ignored_chars;
	}
	
	/**
	 * Set ignored_chars
	 *
	 * @param  array $ignored_chars
	 * @return Scanner
	 */
	public function setIgnoredChars(array $ignored_chars)
	{
	    $this->ignored_chars = $ignored_chars;
	
	    return $this;
	}
	
	/**
	 * Add ignored_char
	 *
	 * @param  int $ignored_char
	 * @return Scanner
	 */
	public function addIgnoredChar($ignored_char)
	{
	    $this->ignored_chars[] = $ignored_char;
	
	    return $this;
	}
	
	/**
	 * Remove ignored_char
	 *
	 * @param  int $ignored_char
	 * @return Scanner
	 */
	public function removeIgnoredChar($ignored_char)
	{
	    $this->ignored_chars = array_diff($this->ignored_chars, array($ignored_char));
	
	    return $this;
	}

	/**
	 * Get max_events
	 *
	 * @return array
	 */
	public function getMaxEvents()
	{
	    return $this->max_events;
	}
	
	/**
	 * Set max_events
	 *
	 * @param  array $max_events
	 * @return Scanner
	 */
	public function setMaxEvents($max_events)
	{
	    $this->max_events = $max_events;
	
	    return $this;
	}

	/**
	 * Get max_chars
	 *
	 * @return array
	 */
	public function getMaxChars()
	{
	    return $this->max_chars;
	}
	
	/**
	 * Set max_chars
	 *
	 * @param  array $max_chars
	 * @return Scanner
	 */
	public function setMaxChars($max_chars)
	{
	    $this->max_chars = $max_chars;
	
	    return $this;
	}

	/**
	 * Get max_time
	 *
	 * @return array
	 */
	public function getMaxTime()
	{
	    return $this->max_time;
	}
	
	/**
	 * Set max_time
	 *
	 * @param  array $max_time
	 * @return Scanner
	 */
	public function setMaxTime($max_time)
	{
	    $this->max_time = $max_time;
	
	    return $this;
	}
}