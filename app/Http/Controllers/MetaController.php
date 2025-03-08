<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class MetaController extends Controller
{
    public function showForm()
    {
        return view('meta.form');
    }

    public function fetchMeta(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');


        // Fetch the metadata using Laravel's HTTP client
        $response = Http::get($url);

        if ($response->failed()) {
            return back()->with('error', 'Failed to fetch meta data.');
        }

        // Extract meta tags
        preg_match_all('/<meta\s+[^>]*?name=["\']?([^"\'>]+)["\']?\s+content=["\']?([^"\'>]+)["\']?/i', $response->body(), $matches);

        $metaTags = array_combine($matches[1], $matches[2]);

        return view('meta.result', compact('metaTags', 'url'));


        // // Call the PHP script
        // $response = Http::get(url('/meta/getMeta.php'), ['url' => $url]);

        // return $response->json();


        // $client = new Client(['verify' => false]);

        // $response = $client->get('https://localhost/fetch-meta', [
        //     'query' => ['url' => 'https://suite.social']
        // ]);

    }

    public function getMeta(Request $request)
    {
        $url = $request->input('url');

        if (!$url) {
            return response()->json(['error' => 'URL is required'], 400);
        }

        // Call the PHP script
        // $response = Http::get(url('api/meta/getMeta.php'), ['url' => $url]);

        // Call the PHP script with SSL verification disabled
        $response = Http::withoutVerifying()->get(url('api/meta/getMeta.php'), ['url' => $url]);

        return $response->json();
    }

    public function getMetaWithGoogle(Request $request)
    {
        // $url = $request->input('url');

        // if (!$url) {
        //     return response()->json(['error' => 'URL is required'], 400);
        // }

        // // Call the PHP script with SSL verification disabled
        // $response = Http::withoutVerifying()->get(url('api/google/meta/getMeta.php'), ['url' => $url]);

        // return $response->json();

        return view('meta.google.index');
    }

}
