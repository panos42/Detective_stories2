<?php

namespace App;

use Goutte\Client;
use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class JobScraper
{
    public static function scrapeAndSave()
    {
        // Create a Goutte client
        $client = new Client();

        // Define the We Work Remotely URL
        $url = 'https://weworkremotely.com/';

        // Fetch the We Work Remotely page
        $crawler = $client->request('GET', $url);

        echo "Scraping and saving job details:\n";
        $count = 0; // To limit the number of scraped listings

        $crawler->filterXPath('//li[contains(@class, "feature")]')->each(function ($node) use (&$count, $client) {
            if ($count >= 20) {
                return false; // Break the loop if the count reaches 20
            }

            $title = $node->filterXPath('.//span[contains(@class, "title")]')->text();
            echo "Title: $title\n"; // Debug message
            $company = $node->filterXPath('.//span[contains(@class, "company")]')->text();
            echo "Company: $company\n"; // Debug message
            $location = $node->filterXPath('.//span[contains(@class, "region company")]')->text();
            echo "Location: $location\n"; // Debug message
            // Extract the job listing link
            $linkNode = $node->filterXPath('.//a[contains(@href, "/remote-jobs/")]');
            $linkText = $linkNode->attr('href');
            echo "job-listing-link: $linkText\n"; // Debug message
            
            if ($linkNode->count() > 0) {
                $link = $linkNode->attr('href'); // Get the job listing link
                // You may need to prepend the base URL to the relative link
                $baseURL = 'https://weworkremotely.com'; // Replace with the actual base URL
                echo "baseUrl: $baseURL\n"; // Debug message
                $link = $baseURL . $link;
                echo "Link: $link\n"; // Debug message

            } else {
                echo "Skipped (no link found): $title - $company\n";
                return; // Skip this iteration and move to the next listing
            }

            // Check if the entry already exists in the database
            $existingEntry = Listing::where('title', $title)->where('company', $company)->first();
            echo "ftanw ws to existing entry\n"; // Debug message

            if (!$existingEntry) {
                // Entry doesn't exist, add it to the database
                echo "test0\n"; // Debug message

                $jobData = self::scrapeJobDescription($client, $link); // Call the description scraping method

          ///////////////////////// 
if (isset($jobData['logo'])) {
    ///////////////////////

    $logoUrl = $jobData['logo'];
    echo "test1\n"; // Debug message

    $logoFileName = self::generateUniqueLogoFileName(); // Generate a unique file name
    echo "test2:\n"; // Debug message

    $logoPath = storage_path('app/public/logos/') . $logoFileName; // Define the storage path

    echo "test3\n"; // Debug message

    // Download and save the logo image
    if (file_put_contents($logoPath, file_get_contents($logoUrl))) {
        // Logo saved successfully with image name
        echo "Logo saved ($logoFileName)\n";
    } else {
        // Logo could not be saved
        echo "Logo could not be saved\n";
    }

    // Add the logo file path to the job data
    $jobData['logo'] = 'logos/' . $logoFileName;
}

                Listing::create([
                    'title' => $title,
                    'company' => $company,
                    'user_id' => 1, // Set the appropriate user ID if needed
                    'tags' => $jobData['tags'], // Updated to include job tags
                    'location' => $location,
                    'email' => 'Scrapped...',
                    'website' => $jobData['website'], // Updated to include website link
                    'min_salary' => '',
                    'max_salary' => '',
                    'listing_views' => 0,
                    'applications_made' => 'Scrapped...',
                    'description' => $jobData['description'], // Set the scraped description
                    'logo' => isset($jobData['logo']) ? $jobData['logo'] : null, // Add logo path
                ]);
                echo "Added: $title - $company\n";
            } else {
                echo "Skipped (already exists): $title - $company\n";
            }

            $count++;
        });

        echo "Scraping and saving completed.";
    }


    public static function scrapeJobDescription($client, $link)
{
    // Fetch the job listing page
    echo "link test : $link\n"; // Debug message

    $jobCrawler = $client->request('GET', $link);
    echo "test4\n"; // Debug message

    // Extract the HTML content of the job description
    $descriptionHtml = $jobCrawler->filterXPath('//div[@class="listing-container"]')->html();

    // Extract all tags (Anywhere in the World, etc.) from the job listing page
    $tags = $jobCrawler->filterXPath('//span[@class="listing-tag"]')->each(function ($tagNode, $i) {
        return $tagNode->text();
    });

    // Limit the number of tags to 4 and filter out empty tags
    $tags = array_slice(array_filter($tags), 0, 4);

    // Extract the website link from the job listing page
    $websiteLink = $jobCrawler->filterXPath('//a[@id="job-cta-alt-2"]')->attr('href');

    // Extract the logo image URL if available
    $logoNode = $jobCrawler->filterXPath('//img[contains(@alt, "is hiring a remote")]');
    $logoUrl = $logoNode->count() > 0 ? $logoNode->attr('src') : null;
    echo "test99\n"; // Debug message

    // Combine the description, tags, website link, and logo URL into an array or other suitable data structure
    $jobData = [
        'description' => $descriptionHtml,
        'tags' => implode(', ', $tags), // Convert tags to a comma-separated string
        'website' => $websiteLink, // Add the website link
        'logo' => $logoUrl, // Add the logo image URL if available
    ];

    return $jobData;
}



public static function generateUniqueLogoFileName()
{
    $timestamp = time();
    $randomString = bin2hex(random_bytes(8)); // Generate a random string
    return "logo_" . $timestamp . "_" . $randomString . ".jpg";
}

}

?>