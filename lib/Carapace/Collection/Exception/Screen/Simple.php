<?php

/*
 * This file is part of the Carapace package.
 *
 * (c) Soufian Salim <soufi@nsal.im>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carapace\Collection\Exception\Screen;

use \Carapace\Collection\Exception\Screen\ScreenAbstract;
use \Carapace\Core\Cursor;

/**
 * Simple screen for exception display
 *
 * @author Soufian Salim <soufi@nsal.im>
 */
class Simple extends ScreenAbstract
{
	/**
	 * {@inheritDoc}
	 */
	public function init()
	{
		$cursor = new Cursor($this);
		$cursor->write('EXCEPTION SCREEN');

		// TODO
	}
}