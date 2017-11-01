<?php

namespace App\Services\XmlParser\Dto;

use Carbon\Carbon;

/**
 * Class ItemDto
 * @package App\Services\XmlParser\Dto
 * @author Marcel
 */
class ItemDto
{
	private $title;
	private $description;
	private $author;
	private $publishedAt;
	private $link;
	private $filename;

	public function setTitle($value)
	{
		$this->title = (string) trim($value);

		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setDescription($value)
	{
		$this->description = (string) trim($value);

		return $this;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setAuthor($value)
	{
		$this->author = (string) trim($value);

		return $this;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function setPublishedAt($value)
	{
		$this->publishedAt = new Carbon((string) trim($value));

		return $this;
	}

	public function getPublishedAt()
	{
		return $this->publishedAt;
	}

	public function setLink($value)
	{
		$this->link = (string) trim($value);

		return $this;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function setFilename($value)
	{
		$this->filename = (string) trim($value);

		return $this;
	}

	public function getFilename()
	{
		return $this->filename;
	}
}