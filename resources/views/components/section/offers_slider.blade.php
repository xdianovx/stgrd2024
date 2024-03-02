@php
    $data = [
        [
            'id' => 1,
            'title' => 'Ипотека для <br> IT-специалистов',
            'description' =>
                'По программе «IT ипотека» от Стройград можно приобрести строящееся жилье по субсидированной ставке 2,99% на срок кредита до 30 лет.',
            'image' => '',
            'slug' => 'offer',
        ],
        [
            'id' => 23,
            'title' => 'Ипотека 3,99% до 30 лет на сданные квартиры',
            'description' =>
                'В проекте Семейный Квартал  Стройград предлагает покупателем субсидированную семейную ипотеку 3,99%.',
            'image' => 'http://127.0.0.1:8000/img/offer-1.jpg',
            'slug' => 'offer',
        ],
        [
            'id' => 3,
            'title' => 'Скидка 50% на полную чистовую отделку',
            'description' => 'Позвольте себе не только квартиру. Включайте полную чистовую отделку в ипотеку!',
            'image' => 'http://127.0.0.1:8000/img/video/big_card.jpg',
            'slug' => 'offer',
        ],
        [
            'id' => 4,
            'title' => 'Апартаменты в ипотеку 7,99% на весь срок',
            'description' =>
                'Одна из самых выгодных сегодня ипотечных программ для приобретения апартаментов — ставка 0,01% на первые 2 года кредитования.',
            'image' => '',
            'slug' => 'offer',
        ],
    ];
@endphp

<section class="offers-slider">
    <div class="container">
        <div class="offers-slider__wrap">
            <div class="swiper swiper-offers-slider">
                <div class="swiper-wrapper">
                    @foreach ($data as $item)
                        <div class="swiper-slide">
                            <x-offer_slide :title="$item['title']" :image="$item['image']" :description="$item['description']" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="link__wrap">
            <x-ui.link href="/stock" class="ml-auto">Все акции и скидки</x-ui.link>
        </div>
    </div>
</section>
