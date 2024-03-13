<?php

namespace App\Services;

use App\Models\Url;
 
class CreateShortUrlService extends GenerateShortUrlService {

    public function checkOrIsNotDuplicate(string $orginalUrl): string 
    {
        $exist = Url::where('orginal_url', $orginalUrl)->first();
        if($exist)
        {
            return $exist->short_url;
        }

        $url = Url::create([
            'orginal_url' => $orginalUrl,
            'short_url' => self::generateUrl($orginalUrl)
        ]);

        return $url->short_url;
    }

}