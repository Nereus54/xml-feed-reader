<?php

namespace App\Services\XmlParser;

use App\Services\XmlParser\Dto\ItemDto;
use App\Services\XmlParser\Exceptions\XmlParserException;
use SimpleXMLElement;

/**
 * Class XmlParserService
 * @package App\Services\XmlParser
 * @author Marcel
 */
class XmlParserService
{
	/**
	 * @var SimpleXMLElement
	 */
	private $xml;

	/**
	 * @param string $url
	 *
	 * @return bool
	 * @author Marcel
	 */
	private function isUrlValid($url) : bool
	{
		return (filter_var($url, FILTER_VALIDATE_URL)) ? true : false;
	}

	/**
	 * @param string $url
	 *
	 * @return bool
	 * @author Marcel
	 */
	private function isUrlExists($url) : bool
	{
		$handle = curl_init($url);

		curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
		curl_exec($handle);
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

		curl_close($handle);

		if ($httpCode >= 200 && $httpCode <= 400) {
			return true;
		}

		return false;
	}

	/**
	 * @param string $url
	 *
	 * @return $this
	 * @throws XmlParserException
	 * @author Marcel
	 */
	public function loadFromUrl($url) : self
	{
		if (! $this->isUrlValid($url)) {
			throw new XmlParserException("Provided URL is not a valid URL.");
		}

		if (! $this->isUrlExists($url)) {
			throw new XmlParserException("Could find any XML on provided URL.");
		}

		if (! ($this->xml = simplexml_load_file($url))) {
			throw new XmlParserException("Could not read XML from URL: {$url}");
		}

		$xmlNamespaces = $this->xml->getDocNamespaces();

		foreach ($xmlNamespaces as $prefix => $namespace) {
			$this->xml->registerXPathNamespace($prefix, $namespace);
		}

		return $this;
	}

	/**
	 * @return array array of ItemDto objects
	 * @author Marcel
	 */
	public function parse() : array
	{
		$items = [];

		foreach ($this->xml->channel->item as $item) {

			$itemFilename = null;

			$imageUrl = trim((string) $item->children('media', 'thumbnail')->attributes()->url);

			if ($this->isUrlExists($imageUrl) && getimagesize($imageUrl)) {
				$itemFilename = $imageUrl;
			}

			$itemDto = app(ItemDto::class);

			$itemDto
				->setTitle($item->title)
				->setDescription($item->description)
				->setAuthor($item->children('dc', 'creator'))
				->setPublishedAt($item->pubDate)
				->setLink($item->link)
				->setFilename($itemFilename);

			$items[] = $itemDto;
		}

		return $items;
	}
}