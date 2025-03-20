<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0">
    <channel>
        <title>My Website RSS Feed</title>
        <link>{{ url('/') }}</link>
        <language>en-us</language>

        @foreach ($articles as $article)
            <item>
                <id>{{ $article->id }}</id>
                <title><![CDATA[ {{ $article->title }} ]]></title>
                <description><![CDATA[ {{ $article->description }} ]]></description>
                <link>{{ $article->link }}</link>
                <content><![CDATA[ {!! $article->content !!} ]]></content>
                <pubDate>{{ $article->created_at->toRssString() }}</pubDate>
                <guid>{{ $article->guid }}</guid>
                <image_link>{{ $article->image_link }}</image_link>
                <created_at>{{ $article->created_at }}</created_at>
                <updated_at>{{ $article->updated_at }}</updated_at>
                <type>{{ $article->type }}</type>
                <categories>
                    @php
                        $categories = is_string($article->categories) ? json_decode($article->categories, true) : $article->categories;
                    @endphp
                    @foreach($categories as $category)
                        <category>{{ $category }}</category>
                    @endforeach
                </categories>
            </item>
        @endforeach

    </channel>
</rss>
