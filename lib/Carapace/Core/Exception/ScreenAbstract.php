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
 * Defines common features for exception screens
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
abstract class ScreenAbstract extends \Carapace\Core\GUI\Frame
{
	/**
	 * The exception to render
	 * 
	 * @var \Carapace\Core\Exception
	 */
	protected $exception;
}