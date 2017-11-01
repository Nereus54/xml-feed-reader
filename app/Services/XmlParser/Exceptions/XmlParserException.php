<?php

namespace App\Services\XmlParser\Exceptions;

use Exception;

/**
 * Class XmlParserException
 * @package App\Services\XmlParser\Exceptions
 * @author Marcel
 */
class XmlParserException extends Exception
{
	/**
	 * XmlParserException constructor.
	 *
	 * @param string $message
	 * @param int    $code
	 */
	public function __construct($message, $code = 400)
	{
		parent::__construct($message, $code);
	}
}