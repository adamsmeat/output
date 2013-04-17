<?php namespace Adamsmeat\Output;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class OutputFacade extends LaravelFacade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'output'; }

}