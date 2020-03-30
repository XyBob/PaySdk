<?php
namespace xytool\PaySdk\Traits;

use xytool\PaySdk\Lib\XML;

trait XMLParams
{
	public function __toString()
	{
		return $this->toString(); 
	}

	public function toString()
	{
		return XML::toString($this);
	}
}