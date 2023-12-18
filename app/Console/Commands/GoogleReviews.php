<?php

namespace App\Console\Commands;

use App\Models\Review;
use App\Models\ReviewSetting;
use App\Utils\Services\Google\Reviews;
use Illuminate\Console\Command;

class GoogleReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:google-reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get Reviews';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reviewsInstance = new Reviews();

        $places = $reviewsInstance->getPlaces(config('services.google.place_name'));


        ReviewSetting::updateOrCreate([
            'place_id' => $places['place_id']
        ], [
            'user_ratings_total' => $places['user_ratings_total'],
            'rating' => $places['rating'],
        ]);

        $reviewNewests = $reviewsInstance->getReviews();

        Review::query()->delete();

        $reviewOldest = $reviewsInstance->getReviews('most_relevant');


        foreach ($reviewNewests as $review) {


            Review::create([
                'review' => $review
            ]);
        }

        foreach ($reviewOldest as $review) {


            Review::create([
                'review' => $review
            ]);
        }


    }
}
