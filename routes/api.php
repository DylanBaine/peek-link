<?php

use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/v1/image.jpg', function () {
    $url = urlencode(request('url', 'https://dylanbaine.com'));
    $googlepsdata = Http::get("https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=$url&screenshot=true")
        ->json();
    $snap = $googlepsdata['lighthouseResult']['audits']['final-screenshot']['details']['data'];
    $snap = str_replace(['_', '-'], ['/', '+'], $snap);
    $snap = str_replace('data:image/jpeg;base64,', '', $snap);
    return response(base64_decode($snap))->header('content-type', 'image/jpeg');
});


function screenshotUrl($url, $options = []): string
{
    $dir = storage_path(str($url)->slug . '-image.png');
    if (file_exists($dir)) {
        Log::debug("@api.5osj5");
        return $dir;
    }
    Log::debug("@api.HUN56", compact('url', 'options'));
    /** @var BrowserFactory $browserFactory */
    $browserFactory = app(BrowserFactory::class);
    $browser = $browserFactory->createBrowser($options);
    try {
        $page = $browser->createPage();
        $page->navigate($url)->waitForNavigation(Page::NETWORK_IDLE, 100000);
        $page->screenshot()->saveToFile($dir);
        return $dir;
    } finally {
        // bye
        Log::debug("close browser");
        $browser->close();
    }
}

Route::get('/v2/image.png', function () {
    $url = request('url', 'https://dylanbaine.com');
    return Cache::remember("images:$url", now()->addHour(), function () use ($url) {
        $dir = screenshotUrl($url);
        return response(file_get_contents($dir))->header('content-type', 'image/png');
    });
});

Route::get('/v2/render/{theme}', function ($theme) {
    $url = request('url');
    $viewPath = "render.{$theme}-theme";
    abort_if(!view()->exists($viewPath), 404);
    return view($viewPath, [
        'url' => $url,
        'domain' => parse_url($url)['host']
    ]);
});

Route::get('/v2/peek-link/{theme}.png', function ($theme) {
    $url = request('url');
    abort_if(!$url, 404);
    $dir = Cache::remember("v3:peek-link:og-image:$theme:$url", now()->addDay(), function () use ($theme, $url) {
        $appUrl = config('app.url');
        return screenshotUrl("$appUrl/api/v2/render/$theme?url=$url", [
            'windowSize'   => [1200, 630],
        ]);
    });
    return response(file_get_contents($dir))->header('content-type', 'image/png');
});


Route::get('/xYM0h', function () {
    return Artisan::call('cache:clear');
});
