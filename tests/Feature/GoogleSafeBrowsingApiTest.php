<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GoogleSafeBrowsingApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_or_api_is_safe_browsing(): void
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=" . env('GOOGLE_API_KEY'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '  {
                "client": {
                    "clientId":      "rk",
                    "clientVersion": "1.5.2"
                },
                "threatInfo": {
                    "threatTypes":      ["MALWARE", "SOCIAL_ENGINEERING"],
                    "platformTypes":    ["WINDOWS"],
                    "threatEntryTypes": ["URL"],
                    "threatEntries": [
                            {"url": "'.env('APP_URL').'/api/shorten-url"},
                        ]
                }
            }',
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        //$err = curl_error($curl);        
    
        $response->assertStatus(200);

        curl_close($curl);
    }
}
