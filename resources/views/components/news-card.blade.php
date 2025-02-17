<div class="news-card row m-0 mt-3">
    <div class="col-md-3 p-3 m-0">
        <img src="{{$news_card_image}}" alt="News Image" class="img-fluid">
    </div>
    <div class="col-md-9 py-3 px-0 ">
        <div class="news-card-content">
            <div class="news-card-content-top">
                <div class="nc-content-labels">
                    {{$news_card_time}} <span class="px-1">•</span>{{$news_card_category}} <span class="px-1">•</span> {{$news_card_label}}
                </div>
            </div>
            <div class="news-card-content-between py-2">
                <div class="nc-heading">{{$news_card_title}}</div>
            </div>
            <div class="news-card-content-bottom">
                <p>{{$news_card_description}}</p>
            </div>
        </div>
    </div>
</div>