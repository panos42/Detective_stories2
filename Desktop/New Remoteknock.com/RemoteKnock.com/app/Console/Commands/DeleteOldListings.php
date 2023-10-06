<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Listing;
use Illuminate\Console\Command;

class DeleteOldListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
 
     protected $signature = 'delete:old-listings';
     protected $description = 'Delete listings that are 2 minutes old';
 
     public function handle()
     {
         // Define the threshold date (30 days ago from today)
         $thresholdDate = Carbon::now()->subDays(30);
 
         // Find and delete listings created on or before the threshold date
         Listing::where('created_at', '<=', $thresholdDate)->delete();
 
         $this->info("Deletion of old listings completed.");
     }
    }


