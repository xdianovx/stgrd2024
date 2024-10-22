<section class="map">
    <div class="container">
        <div class="map__wrap">
            <div class="map__left">
                <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>
                <div class="map-selector">Ставрополь</div>
            </div>

            <div class="map__right">
                <x-ui.text size="md">{!! $item->text_large !!}</x-ui.text>
            </div>
        </div>

    </div>
    <div class="map-map"></div>
</section>
