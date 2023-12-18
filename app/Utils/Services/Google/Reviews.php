<?php

namespace App\Utils\Services\Google;

use Illuminate\Support\Facades\Http;

class Reviews
{
    public $baseUrl;

    protected  $apiKey;

    public function __construct()
    {
        $this->baseUrl = "https://mybusiness.googleapis.com/v4/accounts/{accountId}/locations/{locationId}/reviews";

        $this->apiKey = config('services.google.key');
        $this->placeId = config('services.google.place_id');
    }

    public function getReviews(string $sort = "newest")
    {
        $apiKey = $this->apiKey;
        $placeId = $this->placeId;
        $reviews = [];
        $nextPageToken = null;

        while (true) {
            $response = Http::get("https://maps.googleapis.com/maps/api/place/details/json", [
                'place_id' => $placeId,
                'key' => $apiKey,
                'reviews_sort' => str($sort)->trim(),
                'fields' => 'reviews',
                'pagetoken' => $nextPageToken,
            ]);



            $data = $response->json()['result'] ?? null;

            if ($data && isset($data['reviews'])) {
                $reviews = array_merge($reviews, $data['reviews']);
            }

            $nextPageToken = $data['next_page_token'] ?? null;

            if (!$nextPageToken || count($reviews) >= 30) {
                break; // Break the loop if there are no more pages or if we have at least 30 reviews
            }

            // Sleep for a short interval to ensure the next page token is valid
            sleep(2); // Sleep for 500 milliseconds (0.5 seconds)
        }

        // Ensure we have at least 30 reviews
        $reviews = array_slice($reviews, 0, 30);

        return $reviews;
    }


    public function getPlaces(string $place)
    {

        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => $place,
            'key' => $this->apiKey,
        ]);
        $results = $response->json()['results'] ?? [];

        if (!empty($results)) {

            return [
                "place_id" =>  $results[0]['place_id'],
                'user_ratings_total' => $results[0]['user_ratings_total'],
                'rating' => $results[0]['rating']
            ];
        }

        return response()->json(['error' => 'Place not found.']);
    }

}
