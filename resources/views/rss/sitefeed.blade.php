<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0">
    <channel>
        <item>
            <title>{{ $site->site_name }}</title>
            <link>{{ $site->link }}</link>
            <site_id isPermaLink="false">{{ $site->id }}</site_id>
            <pubDate>{{ $site->created_at->toRssString() }}</pubDate>

            <about_us>{{ $site->about_us ?? 'No description available' }}</about_us>

            <header_links>
                @if (!empty($site->websiteData->header_links))
                    @php
                        $links = is_array($site->websiteData->header_links) ? 
                                $site->websiteData->header_links : 
                                json_decode($site->websiteData->header_links, true);
                    @endphp

                    @if (is_array($links))
                        @foreach($links as $link)
                            <link>{{ $link }}</link>
                        @endforeach
                    @endif
                @endif
            </header_links>


            <email>{{ $site->email }}</email>
            <phone>{{ $site->phone }}</phone>
            <address>{{ $site->address }}</address>
            <gtm>{{$site->gtm}}</gtm>


            <logo>@if ($site->logo){{ url('/sites/logo/' . $site->id) }}@endif</logo>

            <categories>
                @php
                    $categories = is_string($site->categories) ? json_decode($site->categories, true) : $site->categories;
                @endphp

                @if (!empty($categories) && is_array($categories))
                    @foreach($categories as $category)
                        <category>{{ $category }}</category>
                    @endforeach
                @endif
            </categories>


        </item>

    </channel>
</rss>
