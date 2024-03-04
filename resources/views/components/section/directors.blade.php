@php
    $data = [
        [
            'title' => 'Гукалов Андрей Александрович',
            'position' => 'Генеральный директор АН "Стройград"',
            'image' => asset('/img/team-1.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
        [
            'title' => 'Колосова Ольга Ивановна',
            'position' => 'Генеральный директор ООО "Стройград"',
            'image' => asset('/img/team-2.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
        [
            'title' => 'Гукалов Андрей Александрович',
            'position' => 'Генеральный директор АН "Стройград"',
            'image' => asset('/img/team-1.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
        [
            'title' => 'Колосова Ольга Ивановна',
            'position' => 'Генеральный директор ООО "Стройград"',
            'image' => asset('/img/team-2.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
        [
            'title' => 'Гукалов Андрей Александрович',
            'position' => 'Генеральный директор АН "Стройград"',
            'image' => asset('/img/team-1.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
        [
            'title' => 'Колосова Ольга Ивановна',
            'position' => 'Генеральный директор ООО "Стройград"',
            'image' => asset('/img/team-2.jpg'),
            'phone' => '+7 (861) 999-99-99',
            'email' => '@gk-stroygrad.ru',
        ],
    ];

@endphp

<section class="directors">
    <div class="container">
        <div class="directors__wrap">
            <div class="directors__left">
                <x-ui.suptitle>Руководство</x-ui.suptitle>
                <p class="directors__left_text">
                    Благодаря большому опыту и мастерству руководящего состава все компании
                    работают как слаженная команда профессионалов, ведомая единой целью — удовлетворение интересов
                    любимого потребителя.
                </p>

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
