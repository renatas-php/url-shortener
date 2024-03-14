<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CreateShortUrlService;
use App\Http\Requests\UrlStoreRequest;
use App\Models\Url;

class UrlShortenerController extends Controller
{   
    public function store(UrlStoreRequest $request, CreateShortUrlService $CreateShortUrlService)
    {   
        $url = $CreateShortUrlService->checkOrIsNotDuplicate($request->orginalUrl);

        $sessionMessage = session()->flash('success', __('Nuoroda pridėta'));

        return response()->json([
            'data' => $url,
            'sessionMessage' => $sessionMessage
        ]);
    }
}
