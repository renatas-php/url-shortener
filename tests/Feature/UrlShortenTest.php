<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Services\CreateShortUrlService;
use App\Models\Url;

class UrlShortenTest extends TestCase
{   
    protected $CreateShortUrlService;

    /*public function __construct()
    {
        $this->CreateShortUrlService = new CreateShortUrlService();
    }*/
    /**
     * A basic feature test example.
     */

    public function test_not_creating_short_url_on_empty_string(): void {

        $this->post('/api/shorten-url', ['orginal_url' => '', ])->assertStatus(302);
    }

    public function test_or_not_creating_duplicate(): void
    {
        $firstUrl = Url::firstOrFail();

        if($firstUrl)
        {   
            $CreateShortUrlService = new CreateShortUrlService();
            $url = $CreateShortUrlService->checkOrIsNotDuplicate($firstUrl->orginal_url);

            $this->assertEquals($firstUrl->short_url, $url);
        }
    }
}
