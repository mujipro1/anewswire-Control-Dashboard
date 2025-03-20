<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Website; // Assuming you have a Site model
use App\Models\WebsiteData;
use App\Models\Article;

class RSSFeedController extends Controller
{
    public function generateRSS($website)
    {
        $site = Website::where('site_name', $website)->first();
        $rssFeed = view('rss.sitefeed', ['site' => $site]);

        // Return response as XML
        return Response::make($rssFeed, 200, ['Content-Type' => 'application/xml']);
    }
    
    public function dataRSS($website)
    {
    $site = Website::where('site_name', $website)->first();

    if (!$site) {return response()->view('rss.error', [], 404);}

    $siteCategories = $site->categories;
    $siteCategories = is_string($siteCategories) ? json_decode($siteCategories, true) : $siteCategories;

    
    $matchingArticles = Article::all()->filter(function ($article) use ($siteCategories) {
        $articleCategories = json_decode($article->categories, true);
        return count(array_intersect($siteCategories, $articleCategories)) > 0;
    });
    

    $articles = $matchingArticles->values();
    $rssFeed = view('rss.datafeed', compact('site', 'articles'));
    return Response::make($rssFeed, 200, ['Content-Type' => 'application/xml']);
}

public function returningRss()
{
    // Get all websites and articles in just two queries instead of many
    $websites = Website::all();
    $articles = Article::all();
    
    $data = $websites->map(function ($website) use ($articles) {
        // Parse website categories
        $siteCategories = is_string($website->categories) 
            ? json_decode($website->categories, true) 
            : $website->categories;
        
        // Find matching articles without requerying the database
        $matchingArticles = $articles->filter(function ($article) use ($siteCategories) {
            $articleCategories = is_string($article->categories) 
                ? json_decode($article->categories, true) 
                : $article->categories;
            
            // Check for category intersection
            return !empty(array_intersect($siteCategories, $articleCategories));
        });
        
        return [
            'site' => $website,
            'articles' => $matchingArticles->values()
        ];
    });
    
    // Only include websites that have matching articles
    $data = $data->filter(function ($item) {
        return $item['articles']->isNotEmpty();
    })->values();
    
    $rssFeed = view('rss.returningRss', compact('data'));
    
    return response($rssFeed)
        ->header('Content-Type', 'application/xml')
        ->header('Cache-Control', 'public, max-age=3600'); // Optional: Add caching
}

}
