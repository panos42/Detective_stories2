<?php

namespace App\Console\Commands;

use App\JobScraper;
use Illuminate\Console\Command;

class ScrapeJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    try {
        JobScraper::scrapeAndSave();
        $this->info('Scraping completed.');
    } catch (\Exception $e) {
        $this->error('An error occurred: ' . $e->getMessage());
    }
}

}
?>