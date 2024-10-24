@php
    $data = [
        [
            'slug' => 'novost',
            'title' => 'Встречайте новый проект — «Подольские Кварталы»',
            'description' =>
                '«Стройград» продолжает участвовать в комплексном развитии Мариуполя и приступил к строительству первой очереди жилого комплекса «Подольские кварталы» с собственной инфраструктурой.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Мебель в подарок - новый уровень комфорта при покупке недвижимости.',
            'description' =>
                'Хотим сделать ваш переезд еще более комфортным — и берем на себя заботу об обустройстве вашей квартиры.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Новый проект — <br/> «Квартал Марьино»',
            'description' => 'Жилой комплекс расположен в Новой Москве, рядом с благоустроенным парком Марьино.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'НИУ ВШЭ и «Стройград» подготовят специалистов анализа данных в девелопменте',
            'description' => '«Стройград» профинансирует обучение 30 лучших абитуриентов, поступивших на программу.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Атомайз и «Стройград» впервые в России запустили «цифровые квадратные метры»',
            'description' =>
                '«Цифровые метры» позволят квалифицированным инвесторам участвовать в динамике стоимости недвижимости с суммой от 50 тыс. рублей и выше.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Двухуровневый велопаркинг со станцией ремонта открылся в ЖК «Семейный Увартал”',
            'description' =>
                'Конструкцию разместили во дворе корпусов второй очереди строительства. Новое место для хранения рассчитано на 48 велосипедов.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Встречайте новый проект — «Подольские Кварталы»',
            'description' =>
                '«Стройград» продолжает участвовать в комплексном развитии Мариуполя и приступил к строительству первой очереди жилого комплекса «Подольские кварталы» с собственной инфраструктурой.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Мебель в подарок - новый уровень комфорта при покупке недвижимости.',
            'description' =>
                'Хотим сделать ваш переезд еще более комфортным — и берем на себя заботу об обустройстве вашей квартиры.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Новый проект — <br/> «Квартал Марьино»',
            'description' => 'Жилой комплекс расположен в Новой Москве, рядом с благоустроенным парком Марьино.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'НИУ ВШЭ и «Стройград» подготовят специалистов анализа данных в девелопменте',
            'description' => '«Стройград» профинансирует обучение 30 лучших абитуриентов, поступивших на программу.',
            'created_at' => '23 мая 2023',
        ],
        [
            'slug' => 'novost',
            'title' => 'Атомайз и «Стройград» впервые в России запустили «цифровые квадратные метры»',
            'description' =>
                '«Цифровые метры» позволят квалифицированным инвесторам участвовать в динамике стоимости недвижимости с суммой от 50 тыс. рублей и выше.',
            'created_at' => '23 мая 2023',
        ],
    ];

    $status = [
        [
            'id' => '1',
            'title' => 'Проект',
        ],
        [
            'id' => '1',
            'title' => 'Город',
        ],
        [
            'id' => '1',
            'title' => 'Год',
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    <main class="news-page" data-barba="container" data-barba-namespace="news">
        {{ Breadcrumbs::render('news') }}

        <section class="news-page-hero">
            <div class="container">
                <div class="news-page-title__wrap">
                    <h1 class="news-page-title">Новости</h1>
                    <x-ui.link href="/stock">Акции</x-ui.link>
                </div>
            </div>
        </section>


        <section class="news-catalog">
            <div class="container">
                <div class="news-catalog__filter_wrap">
                    <div class="news-catalog__filter">
                        <x-ui.dropdown placeholder="Проект" :list="$status" />
                        <x-ui.dropdown placeholder="Город" :list="$status" />
                        <x-ui.dropdown placeholder="Год" :list="$status" />
                    </div>

                    <div class="news-catalog__filter_count">Найдено: 15</div>
                </div>
            </div>

            <div class="container">
                <div class="news-cards">
                    @foreach ($data as $item)
                        @if ($loop->index < 6)
                            <x-news_card :slug="$item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
                        @endif
                    @endforeach
                </div>
            </div>

            <ul class="news-page__marquee ticker" data-speed="200" data-direction="left">
                <li>
                    <p>Новость, которую мы хотим выделить</p>

                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="68" viewBox="0 0 76 68"
                        fill="none">
                        <g clip-path="url(#clip0_2470_5993)">
                            <rect x="0.0844116" y="32.8223" width="9.3718" height="39.3384"
                                transform="rotate(-23.1102 0.0844116 32.8223)" fill="#1F1F1F" />
                            <path d="M36.2605 17.377L32.4366 29.1983L3.75735 41.437L0.078909 32.8173L36.2605 17.377Z"
                                fill="#1F1F1F" />
                            <path d="M40.5207 48.145L51.7015 53.5631L15.5199 69.0034L11.8415 60.3837L40.5207 48.145Z"
                                fill="#1F1F1F" />
                            <path d="M39.9918 15.791L48.0263 12.3623L60.5148 41.6268L55.4322 51.9726L39.9918 15.791Z"
                                fill="#1F1F1F" />
                            <path
                                d="M76.1774 0.345703L69.9039 13.2064L50.8022 21.358L47.0547 19.5038L39.9958 15.7861L76.1774 0.345703Z"
                                fill="#1F1F1F" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2470_5993">
                                <rect width="75" height="68" fill="white" transform="translate(0.078125)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <p>Новость, которую мы хотим выделить</p>

                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="68" viewBox="0 0 76 68"
                        fill="none">
                        <g clip-path="url(#clip0_2470_5993)">
                            <rect x="0.0844116" y="32.8223" width="9.3718" height="39.3384"
                                transform="rotate(-23.1102 0.0844116 32.8223)" fill="#1F1F1F" />
                            <path d="M36.2605 17.377L32.4366 29.1983L3.75735 41.437L0.078909 32.8173L36.2605 17.377Z"
                                fill="#1F1F1F" />
                            <path d="M40.5207 48.145L51.7015 53.5631L15.5199 69.0034L11.8415 60.3837L40.5207 48.145Z"
                                fill="#1F1F1F" />
                            <path d="M39.9918 15.791L48.0263 12.3623L60.5148 41.6268L55.4322 51.9726L39.9918 15.791Z"
                                fill="#1F1F1F" />
                            <path
                                d="M76.1774 0.345703L69.9039 13.2064L50.8022 21.358L47.0547 19.5038L39.9958 15.7861L76.1774 0.345703Z"
                                fill="#1F1F1F" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2470_5993">
                                <rect width="75" height="68" fill="white" transform="translate(0.078125)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <p>Новость, которую мы хотим выделить</p>

                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="68" viewBox="0 0 76 68"
                        fill="none">
                        <g clip-path="url(#clip0_2470_5993)">
                            <rect x="0.0844116" y="32.8223" width="9.3718" height="39.3384"
                                transform="rotate(-23.1102 0.0844116 32.8223)" fill="#1F1F1F" />
                            <path d="M36.2605 17.377L32.4366 29.1983L3.75735 41.437L0.078909 32.8173L36.2605 17.377Z"
                                fill="#1F1F1F" />
                            <path d="M40.5207 48.145L51.7015 53.5631L15.5199 69.0034L11.8415 60.3837L40.5207 48.145Z"
                                fill="#1F1F1F" />
                            <path d="M39.9918 15.791L48.0263 12.3623L60.5148 41.6268L55.4322 51.9726L39.9918 15.791Z"
                                fill="#1F1F1F" />
                            <path
                                d="M76.1774 0.345703L69.9039 13.2064L50.8022 21.358L47.0547 19.5038L39.9958 15.7861L76.1774 0.345703Z"
                                fill="#1F1F1F" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2470_5993">
                                <rect width="75" height="68" fill="white" transform="translate(0.078125)" />
                            </clipPath>
                        </defs>
                    </svg>
                </li>
            </ul>

            <div class="container">
                <div class="news-cards --second">
                    @foreach ($data as $item)
                        @if ($loop->index > 6)
                            <x-news_card :slug="$item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
                        @endif
                    @endforeach
                </div>

                <div class="news-cards__loadmore">
                    <x-ui.showmore-btn class="showmore">Ещё новости</x-ui.showmore-btn>
                </div>
            </div>
        </section>

        <x-subscribe />

        <section class="spacer"></section>
    </main>
@endsection
