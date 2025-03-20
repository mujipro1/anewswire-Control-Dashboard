<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <title>{{ config('app.name') }} - NewsWire Networks</title>
        <link>{{ url('/') }}</link>
        <description>Latest news articles grouped by websites and categories</description>
        <language>en-us</language>
        <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>
        <atom:link href="{{ url()->current() }}" rel="self" type="application/rss+xml" />
        
        @foreach($data as $websiteData)
            <item>
                
                <website>
                    <title>{{ $websiteData['site']->site_name }}</title>
                    <link>{{ $websiteData['site']->link }}</link>
                    <categories>{{ is_string($websiteData['site']->categories) ? $websiteData['site']->categories : json_encode($websiteData['site']->categories) }}</categories>
                    
                    <articles>
                        @foreach($websiteData['articles'] as $article)
                            <article>
                                <guid>{{ $article->guid }}</guid>
                                <source_link>{{ $article->link }}</source_link>

                                @php
                                if ($article['type'] == 'press release'){$dynamicType = 'release';}
                                if ($article['type'] == 'ceo interview'){$dynamicType = 'interview';}
                                if ($article['type'] == 'product review'){$dynamicType = 'review';}
                                @endphp

                                <end_link>{{ $websiteData['site']->link }}/article/{{$dynamicType}}/{{$article->guid}}/{{rawurlencode($article->title)}}</end_link>
                                <pubDate>{{ $article->created_at->toRssString() }}</pubDate>
                            </article>
                        @endforeach
                    </articles>
                </website>
            </item>
        @endforeach
    </channel>
</rss>