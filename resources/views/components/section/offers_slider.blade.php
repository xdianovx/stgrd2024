
<section class="offers-slider">
    <div class="container">
        <div class="offers-slider__wrap">
            <div class="swiper swiper-offers-slider">
                <div class="swiper-wrapper">
                    @foreach ($promotions as $item)
                        <div class="swiper-slide">
                            <x-offer_slide :title="$item['title']" :image="$item['image']" :slug="$item['slug']" :cart_content="$item['cart_content']" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="link__wrap">
            <x-ui.link href="/promotions" class="ml-auto">Все акции и скидки</x-ui.link>
        </div>
    </div>
</section>
