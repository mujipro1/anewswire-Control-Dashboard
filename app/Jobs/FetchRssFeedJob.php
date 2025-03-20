<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class FetchRssFeedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        $rss = simplexml_load_file('http://pr.anewswire.com/rss/rss-feed.xml');
        $namespaces = $rss->getNamespaces(true);
    
        foreach ($rss->channel->item as $item) {
            $content = (string) $item->children($namespaces['content'])->encoded;
    
            // Extract categories
            $categories = [];
            foreach ($item->category as $category) {
                $categories[] = (string) $category;
            }
    
            // Extract image from <media:content>
            $imageUrl = null;
            if (isset($item->children($namespaces['media'])->content)) {
                $imageUrl = (string) $item->children($namespaces['media'])->content->attributes()->url;
            }
    
            // Extract updated timestamp
            $updatedTimestamp = isset($item->updated) ? Carbon::parse((string) $item->updated) : null;
    
            // Find existing article by guid
            $article = Article::where('guid', (string) $item->guid)->first();
            
            if (!$article) {
                // Insert new article
                Article::create([
                    'guid'        => (string) $item->guid,
                    'title'       => (string) $item->title,
                    'link'        => (string) $item->link,
                    'description' => (string) $item->description,
                    'type'        => (string) $item->type,
                    'pub_date'    => Carbon::parse((string) $item->pubDate)->toDateString(),
                    'content'     => $content,
                    'categories'  => json_encode($categories),
                    'image_link'  => $imageUrl,
                    'updated_at'  => $updatedTimestamp, // Set initial updated_at value
                ]);
            } elseif ($updatedTimestamp && $article->updated_at->lessThan($updatedTimestamp)) {
                // Update only if the updated timestamp is newer
                $article->update([
                    'title'       => (string) $item->title,
                    'link'        => (string) $item->link,
                    'description' => (string) $item->description,
                    'pub_date'    => Carbon::parse((string) $item->pubDate)->toDateString(),
                    'content'     => $content,
                    'categories'  => json_encode($categories),
                    'type'        => (string) $item->type,
                    'image_link'  => $imageUrl,
                    'updated_at'  => $updatedTimestamp,
                ]);
            }
        }
    }
}
