<?php

namespace Tests;

use App\Services\XmlParser\Dto\ItemDto;
use App\Services\XmlParser\Exceptions\XmlParserException;
use App\Services\XmlParser\XmlParserService;

/**
 * Class XmlParserServiceTest
 * @package Tests
 * @author Marcel
 */
class XmlParserServiceTest extends TestCase
{
	/**
	 * @var XmlParserService
	 */
	private $service;

	public function setUp()
	{
		parent::setUp();

		$this->service = app(XmlParserService::class);
	}

	/**
	 * @test
	 * @throws XmlParserException
	 */
	public function testLoadXmlSuccess()
	{
		$response = $this->service->loadFromUrl('http://www.cityam.com/feeds/sections/news.xml');

		$this->assertNotEmpty($response);

		$this->assertInstanceOf(XmlParserService::class, $response);
	}

	/**
	 * @test
	 * @throws XmlParserException
	 */
	public function testLoadXmlFailNonValidUrl()
	{
		$this->expectException(XmlParserException::class);

		$this->service->loadFromUrl('abc123');
	}

	/**
	 * @test
	 * @throws XmlParserException
	 */
	public function testParseLoadedXmlSuccess()
	{
		$response = $this->service->loadFromUrl('http://www.cityam.com/feeds/sections/news.xml')->parse();

		$this->assertNotEmpty($response);

		$this->assertNotCount(0, $response);

		$this->assertInternalType('array', $response);

		$this->assertInstanceOf(ItemDto::class, $response[0]);
	}

	/**
	 * @test
	 * @throws XmlParserException
	 */
	public function testParseLoadedXmlFail()
	{
		$this->expectException(XmlParserException::class);

		$this->service->loadFromUrl('abc123')->parse();
	}
}