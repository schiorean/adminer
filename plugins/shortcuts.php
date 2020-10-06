<?php

/**
 * @author Sorin Chiorean
 * @license MIT
 */
class AdminerShortcuts
{
	public function head()
	{
		echo '<script type="text/javascript" '.nonce().' src="static/adminer-shortcuts.js?' . time() . '""></script>';
	}
}
