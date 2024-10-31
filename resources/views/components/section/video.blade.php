<section class="section showreel" data-cursor-text="Смотреть">
    <div class="parallax-showreel">
        <video autoplay loop playsinline muted class="showreel-short">
            <source src="{{ URL::to('/') . Storage::url($item->video_preview) }}" type="video/mp4" />
        </video>
    </div>


</section>

<div class="showreelmodal">
    <video autoplay loop playsinline muted data-cursor-text="Закрыть">
        <source src="{{ URL::to('/') . Storage::url($item->video_in_player) }}" type="video/mp4" />
    </video>

    <div class="settings">
        <div class="container">
            <div class="settings__wrap">
                <div class="settings__btn">Звук</div>
            </div>
        </div>
    </div>
</div>
