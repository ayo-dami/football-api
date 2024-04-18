<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\GuzzleException;
use Exception;

class FootballStatsController extends Controller
{
    /**
     * Fetching information of football teams and competitions
     * TODO: add internal logging
     * 
     * @return null|array
     */
    public function getFootballData(): ?array
    {
        $client = new Client();
        $footBallApiKey = config('apikey.football_api_key');
        $footBallApiURL = config('apikey.football_api_url');
        $apiOptions = [
            'headers' => [
                'X-Auth-Token' => $footBallApiKey
            ]
        ];

        try {
           $response = $client->request('GET', $footBallApiURL,  $apiOptions);

           $result = json_decode($response->getBody()->getContents(), true);

        } catch (GuzzleException $e) {
            //internal logging Log::Error("issue case xyz")
            return response()->json(['error' => 'API Request failed'], 404);
        }

        return view('football-stats', ['competitions' => $result['competitions']]);
    }
}
