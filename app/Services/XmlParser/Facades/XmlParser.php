<?php

namespace App\Services\XmlParser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class XmlParser
 * @package App\Services\XmlParser\Facades
 * @author Marcel
 */
class XmlParser extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 * @author Marcel
	 */
	protected static function getFacadeAccessor()
	{
		return 'xmlParser';
	}
}