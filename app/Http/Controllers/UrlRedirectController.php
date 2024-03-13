<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Url;

class UrlRedirectController extends Controller
{
    public function index(Request $request)
    {   
        $requestUrl = explode('/', $request->route('url'));

        $existUrl = Url::where('short_url', env('APP_URL') . '/' . end($requestUrl))->firstOrFail();
        return redirect($existUrl->orginal_url);
    }
}
