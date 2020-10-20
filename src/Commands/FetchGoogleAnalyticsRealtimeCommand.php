<?php

namespace vdvcoder\GoogleAnalyticsRealtimeTile\Commands;

use Illuminate\Console\Command;
use vdvcoder\GoogleAnalyticsRealtimeTile\GoogleAnalyticsRealtimeApi;
use vdvcoder\GoogleAnalyticsRealtimeTile\GoogleAnalyticsRealtimeStore;

class FetchGoogleAnalyticsRealtimeCommand extends Command
{
    protected $signature = 'dashboard:fetch-google-analytics-realtime';

    protected $description = 'Fetch Google Analytics Realtime data';

    public function handle(GoogleAnalyticsRealtimeApi $realtime)
    {
        $this->info('Fetching Google Analytics ...');

        $response = $realtime->getAnalyticsRealtime();

        GoogleAnalyticsRealtimeStore::make()->setAnalyticsRealtime($response);

        $this->info('All done!');
    }
}