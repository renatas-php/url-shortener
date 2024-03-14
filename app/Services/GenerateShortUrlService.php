<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

use App\Repositories\AlgorithmTypeRepository;

use App\Models\Url;
 
class GenerateShortUrlService {

    private $algorithmTypeRepository;

    public function __construct() {
        $this->algorithmTypeRepository = new AlgorithmTypeRepository();
    }

    public function generateUrl(string $orginalUrl): string
    {
        $shortUrl = $this->algorithmTypeRepository->standardMaximum();

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
        return Config::get('app.url') . '/';
    }

}