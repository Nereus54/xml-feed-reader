<?php

namespace App\Classes;

use Carbon\Carbon;

/**
 * Class FormatterHelper
 * @package App\Classes
 * @author Marcel
 */
class FormatterHelper
{
	/**
	 * @param string $date
	 * @param string $dateFormat
	 *
	 * @return mixed
	 * @author Marcel
	 */
	public static function dateTimeFormat($date, $dateFormat = 'M jS, Y, g:i:s a')
	{
		return Carbon::parse($date)->format($dateFormat);
	}
}