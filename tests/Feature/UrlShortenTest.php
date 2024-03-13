<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Services\CreateShortUrlService;
use App\Models\Url;

class UrlShortenTest extends TestCase
{   
    /**
     * Test validation then passing empty string.
     */
    public function test_not_creating_short_url_on_empty_string(): void {

        $this->post('/api/shorten-url', ['orginal_url' => '', ])->assertStatus(302);
    }

    /**
     * Test or not creating same record in databse if orginal url is already exist.
     */
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
