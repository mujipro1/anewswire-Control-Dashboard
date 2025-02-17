<div class="row p-3">
    <h3 class="headings my-4">
        {{$panel == "NEWS" ? 
            'LATEST NEWS'
            : 'PRESS RELEASE'
        }}
    </h3>
        @for ($i = 0; $i < 3; $i++)
            @component('components.news-card')
                @slot('news_card_time') 3 hours ago @endslot
                @slot('news_card_label') Label Pending @endslot
                
                @slot('news_card_title') 

                While accepting a special honor at the Writers Guild Awards on Saturday 
                
                @endslot
                
                @slot('news_card_category') International Relations @endslot
                @slot('news_card_image') {{asset('images/M1d.png')}} @endslot
                
                @slot('news_card_description') 
                While accepting a special honor at the Writers Guild Awards on Saturday night, Vince Gilligan warned the crowd that he was going to “go political” before calling on Hollywood to give more attention
                @endslot
            @endcomponent
        @endfor
</div>