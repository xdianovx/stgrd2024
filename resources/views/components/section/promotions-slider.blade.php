@props(['data'])


<section {{ $attributes->class(['news-slider']) }}>
    <div class="container">
        <h3 class="news-slider__title">Последние акции</h3>

        <div class="news-slider__wrap">
            <div class="swiper news-slider-slider">
                <div class="swiper-wrapper">
                    @foreach($data as $item)
                        <div class="swiper-slide">
                        <x-news_card :slug="$item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
