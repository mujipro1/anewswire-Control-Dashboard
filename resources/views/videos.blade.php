<div class="row p-3">
    <h3 class="headings my-4">
        VIDEOS
    </h3>
        <div class="video-card my-3">
            @for ($i = 0; $i < 3; $i++)
            @component('components.video-card')
            @slot('video_src_link') https://www.youtube.com/embed/bn0Kh9c4Zv4 @endslot
            @slot('video_description') This is a video description @endslot
            @endcomponent
            @endfor
        </div>
</div>