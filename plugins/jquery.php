<?php

class AminerJQuery
{
	public function head()
	{
		echo '<script type="text/javascript" '.nonce().' src="static/jquery-3.4.1.min.js"></script>';
	}
}