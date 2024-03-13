<?php

namespace App\Services;

use App\Repositories\AlgorithmTypeRepository;

use App\Models\Url;
 
class GenerateShortUrlService {

    private $algorithmTypeRepository;

    public function __construct() {
        $this->algorithmTypeRepository = new AlgorithmTypeRepository();//$algorithmTypeRepository;
    }

    public function generateUrl(string $orginalUrl): string
    {
        $shortUrl = $this->algorithmTypeRepository->standard();

        $existShortUrl = Url::select('short_url')->where('short_url', $shortUrl)->first();
        if(!$existShortUrl) 
        {
            return $this->urlPrefix() . $shortUrl;
        }
        else {
            self::generateUrl();
        }
    }

    protected function urlPrefix(): string
    {   
        return env('APP_URL') . '/';
    }

}