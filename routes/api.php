<?php

use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Page;
use Illuminate\Support\Facades\Http;
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

Route::get('/v2/image.png', function () {

    $browserFactory = new BrowserFactory();

    // starts headless Chrome
    $browser = $browserFactory->createBrowser([
        'windowSize'   => [1200, 630],
    ]);
    $url = request('url', 'https://dylanbaine.com');
    try {
        // creates a new page and navigate to an URL
        $page = $browser->createPage();
        $page->navigate($url)->waitForNavigation(Page::NETWORK_IDLE);
        // $pageTitle = $page->evaluate('document.title')->getReturnValue();
        // dd($pageTitle);
        $dir = storage_path(str($url)->slug . '-image.png');
        $page->screenshot()->saveToFile($dir);
        return response(file_get_contents($dir))->header('content-type', 'image/png');
    } finally {
        // bye
        $browser->close();
    }
});
