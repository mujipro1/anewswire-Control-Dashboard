<!-- Video Card -->
<div class="video-card row m-0 mt-3 mb-3">
    <div class="video-thumbnail">
        <iframe width="100%" height="auto" src="{{$video_src_link}}" 
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe>
    </div>
    <div class="video-details mb-4">
        <!-- Clickable Description -->
        <a href="#" class="video-description" data-bs-toggle="modal" data-bs-target="#videoModal" 
           data-video-url="{{$video_src_link}}" 
           data-video-title="{{$video_description}}">
            {{$video_description}}
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel"></h5> <!-- Dynamic Title -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="modalVideo" src="" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Load Video and Title on Click -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var modalVideo = document.getElementById("modalVideo");
    var modalTitle = document.getElementById("videoModalLabel");

    document.querySelector(".video-description").addEventListener("click", function (event) {
        var videoUrl = event.target.getAttribute("data-video-url") + "?autoplay=1";
        var videoTitle = event.target.getAttribute("data-video-title");

        modalVideo.src = videoUrl;
        modalTitle.textContent = videoTitle;
    });

    document.getElementById("videoModal").addEventListener("hidden.bs.modal", function () {
        modalVideo.src = "";
    });
});
</script>
