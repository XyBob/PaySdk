<?php
namespace xytool\PaySdk\Traits;

trait JSONParams
{
	public function __toString()
	{
		return $this->toString(); 
	}

	public function toString()
	{
		return \json_encode($this);
	}
}