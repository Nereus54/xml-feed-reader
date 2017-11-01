<?php

namespace App;

use App\Services\XmlParser\Dto\ItemDto;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
	protected $fillable = [
		'title',
		'description',
		'author',
		'published_at',
		'link',
		'filename',
	];

}