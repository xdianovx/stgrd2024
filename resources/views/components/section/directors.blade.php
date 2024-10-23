
<section class="directors">
    <div class="container">
        <div class="directors__wrap">
            <div class="directors__left">
                <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>
                <p class="directors__left_text">{!!$item->description!!}</p>

                <x-ui.square_btn href="/team">Вся команда</x-ui.square_btn>

            </div>
            <div class="directors__right">
                <div class="directors-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($data as $item)
                            <div class="swiper-slide">
                                <x-director_slide :title="$item['title']" :position="$item['position']"
                                                  :image="$item['image']"
                                                  :phone="$item['phone']" :email="$item['email']"/>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
