<?php

namespace App\Console\Commands;

use App\NewsItem;
use App\Services\XmlParser\Dto\ItemDto;
use Exception;
use Illuminate\Console\Command;
use XMLParser;

class ParseNewsFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsFeed:parse {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses the City AM RSS News Feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    $this->info('Parsing XML Feed...');

    	try {
		    XMLParser::loadFromUrl($this->argument('filename'));

	    } catch (Exception $exception) {
    		$this->error($exception->getMessage());
    		die('Exiting...');
	    }

	    $items = XMLParser::parse();

    	/** @var ItemDto $item */
	    foreach ($items as $item) {

	    	NewsItem::create([
			    'title'        => $item->getTitle(),
			    'description'  => $item->getDescription(),
			    'author'       => $item->getAuthor(),
			    'published_at' => $item->getPublishedAt(),
			    'link'         => $item->getLink(),
			    'filename'     => $item->getFilename(),
		    ]);
	    }

	    $this->info('XML Feed has been successfully parsed.');
    }
}
