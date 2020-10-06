<?php

/**
 * @author David Grudl
 * @license BSD
 */
class AdminerRemoteColor
{
	public function head()
	{
		echo '<script' . nonce() . '>document.documentElement.className+=" ' . SERVER . '";</script>';
	}
}
