<?php

// adamsmeat/output-specific helpers
if ( ! function_exists('g'))
{
	/**
	 * Get global output variable.
	 *
	 * @param  string  $key 
	 * @return mixed
	 */	
	function g($key)
	{
		return Output::g($key);
	}
}
