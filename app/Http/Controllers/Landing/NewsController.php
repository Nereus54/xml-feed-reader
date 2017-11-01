<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\NewsItem;

/**
 * Class NewsController
 * @package App\Http\Controllers\Landing
 * @author Marcel
 */
class NewsController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @author Marcel
	 */
	public function getNewsItems()
	{
		return view('landing.news.newsItems', [
			'newsItems' => NewsItem::all(),
		]);
	}
}