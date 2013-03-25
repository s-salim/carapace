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
 * Represents an exception within the program
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Exception extends \Exception
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
}