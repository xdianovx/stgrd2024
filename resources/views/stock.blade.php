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
    <main class="news-page" data-barba="container" data-barba-namespace="stock">

        {{ Breadcrumbs::render('stock') }}
        <section class="news-page-hero">
            <div class="container">

                <div class="news-page-title__wrap">
                    <h1 class="news-page-title">Акции</h1>
                    <x-ui.link href="/news">Новости</x-ui.link>
                </div>
            </div>
        </section>


        <section class="news-catalog">
            <div class="container">
                <div class="news-catalog__filter_wrap">
                    <div class="news-catalog__filter">
                      <x-ui.dropdown :list="$status"/>
                      <x-ui.dropdown :list="$status"/>
                      <x-ui.dropdown :list="$status"/>
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

            {{-- <div class="news-page__marquee">
                <p>Новость, которую мы хотим выделить</p>
            </div> --}}

            <div class="container">
                <div class="news-cards">
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
