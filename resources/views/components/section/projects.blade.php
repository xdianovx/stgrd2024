@php
    $status = [
        [
            'id' => '1',
            'title' => 'Строится',
        ],
        [
            'id' => '1',
            'title' => 'Сдан',
        ],
        [
            'id' => '1',
            'title' => 'В эксплуатации',
        ],
    ];

    $city = [
        [
            'id' => '1',
            'title' => 'Москва',
        ],
        [
            'id' => '1',
            'title' => 'Краснодар',
        ],
        [
            'id' => '1',
            'title' => 'Сочи',
        ],
    ];
@endphp

<section class="projects">
    <div class="container">
        <div class="projects-top">
            <x-ui.title tag='h2' class="uppercase">Наши <br> проекты</x-ui.title>
            <div class="projects-top__sort">
                <x-ui.dropdown :list="$status" placeholder="Выберите статус постройки" />
                <x-ui.dropdown :list="$city" placeholder="Выберите город" />
            </div>
        </div>

        <div class="big-card">
            <div class="big-card__image parallax">
                <img src="{{ asset('img/video/big_card.jpg') }}" alt="Фотография Дворянская усадьба">
            </div>

            <div class="big-card__info">
                <h3 class="big-card__title">Дворянская усадьба</h3>
                <p class="big-card__description">
                    «Семейный квартал» — это экологичный проект рядом с Дубковским и Подушкинским лесами. Он сочетает
                    близость к природным комплексам, престижный статус западного направления и возможность удобно
                    добраться до столицы.
                </p>

                <div class="big-card__info_col">
                    <p>г. Ростов-на-Дону</p>
                    <p>Заселение до 31.03.2023</p>
                </div>

                <div class="big-card__info_link">
                    <x-ui.link href='/projects/asd'>от 3,3 млн. руб.</x-ui.link>
                </div>
            </div>
        </div>
    </div>
</section>
