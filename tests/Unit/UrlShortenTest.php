<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Services\CreateShortUrlService;
use App\Models\Url;

class UrlShortenTest extends TestCase
{   

    /**
     * A basic unit test example.
     */
    /*public function test_or_not_creating_duplicate(): void
    {   
        $firstUrl = Url::firstOrFail();

        if($firstUrl)
        {   
            $CreateShortUrlService = new CreateShortUrlService();
            $url = $CreateShortUrlService->checkOrIsNotDuplicate($firstUrl->orginalUrl);
        
            $this->assertEquals($firstUrl->orginalUrl, $url->orginalUrl);
        }
    }*/
}
