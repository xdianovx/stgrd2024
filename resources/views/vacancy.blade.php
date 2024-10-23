@php

    $reviews = [
        [
            'title' => 'Ксения <br/> Самарская',
            'position' => 'Бухгалтер',
            'slug' => 'asd',
            'photo' => asset('img/rev-1.jpg'),
        ],
        [
            'title' => 'Артём <br/> Хорошко',
            'position' => 'Менеджер по работе с клиентами',
            'slug' => 'asd',
            'photo' => asset('img/rev-2.jpg'),
        ],
        [
            'title' => 'Кирилл <br/> Гурбанов',
            'position' => 'Машинист',
            'slug' => 'asd',
            'photo' => asset('img/rev-3.jpg'),
        ],
        [
            'title' => 'Алексей <br/> Запашный',
            'position' => 'Инженер',
            'slug' => 'asd',
            'photo' => asset('img/rev-4.jpg'),
        ],
    ];

    $droplist = [
        [
            'id' => '1',
            'title' => 'Москва',
        ],
        [
            'id' => '1',
            'title' => 'Саратов',
        ],
        [
            'id' => '1',
            'title' => 'Калинград',
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    <main class="vacancy-page" data-barba="container" data-barba-namespace="vacancy">
        <section class="vacancy-page-hero">
            <div class="container">
                {{ Breadcrumbs::render('vacancy') }}
                <h1 class="vacancy-page-title">{{ $page->title }}</h1>

                <p class="vacancy-page-hero__text">{{ $page->text_right }}</p>
            </div>
        </section>

        <section class="actual-vacancy">
            <div class="container">
                <div class="actual-vacancy__top">
                    <h2 class="actual-vacancy__title">Актуальные <br> вакансии на сегодня </h2>
                    <p class="actual-vacancy__count">({{ $vacancies->count() }} свободных вакансий)</p>
                    <div class="actual-vacancy__city">
                        <x-ui.dropdown :list="$droplist" />
                    </div>
                </div>
            </div>

            <div class="actual-vacancy__wrap">
                <div class="actual-vacancy__head"></div>
                <div class="hr"></div>
                <div class="actual-vacancy__list dimm">
                    @foreach ($vacancies as $item)
                        <x-vacancy-item :title="$item['title']" :city="$item['city']" :expirience="$item['expirience']" :salary="$item['salary']"
                            :slug="$item['slug']" :duties="$item['duties']" :terms="$item['terms']" :reqs="$item['reqs']" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="team-reviews">
            <div class="container">
                <div class="team-reviews__top">
                    <h2 class="team-reviews__title">Отзывы <br /> сотрудников</h2>
                    <x-ui.link href="/">Оставить отзыв</x-ui.link>
                </div>
            </div>

            <div class="hr"></div>

            <div class="container">
                <div class="team-reviews__wrap ">
                    @foreach ($reviews as $item)
                        <div class="team-reviews__item">
                            <div class="team-reviews__item_img">
                                <img src="{{ $item['photo'] }}" alt="">
                            </div>

                            <h3>{!! $item['title'] !!}</h3>
                            <p class="team-reviews__item_position">{{ $item['position'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <x-cooperate-form />
        <section class="spacer"></section>
    </main>
@endsection
