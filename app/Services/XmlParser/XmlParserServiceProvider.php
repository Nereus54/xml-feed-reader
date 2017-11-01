<?php

namespace App\Services\XmlParser;

use Illuminate\Support\ServiceProvider;

/**
 * Class XmlParserServiceProvider
 * @package App\Services\XmlParser
 * @author Marcel
 */
class XmlParserServiceProvider extends ServiceProvider
{
	/**
	 * Boot the service provider.
	 *
	 * @return void
	 * @author Marcel
	 */
	public function boot()
	{
		// Do nothing...
	}

	/**
	 * Register the service provider services.
	 *
	 * @return void
	 * @author Marcel
	 */
	public function register()
	{
		$this->app->bind('xmlParser', XmlParserService::class);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 * @author Marcel
	 */
	public function provides()
	{
		return [
			'xmlParser',
		];
	}
}