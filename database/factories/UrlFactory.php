<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Services\CreateShortUrlService;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $CreateShortUrlService = new CreateShortUrlService();
        $orginalUrl = 'https://' . Str::random(40);
        $shortUrl = $CreateShortUrlService->checkOrIsNotDuplicate($orginalUrl);

        return [
            'orginal_url' => $orginalUrl,
            'short_url' => $shortUrl
        ];
    }
}
