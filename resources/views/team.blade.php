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

@extends('layouts.main')

@section('content')
    <main class="team-page" data-barba="container" data-barba-namespace="team">
        {{ Breadcrumbs::render('team') }}
        <section class="team-page-hero">
            <div class="container">
                <h1 class="team-page-title">Руководство</h1>

                <p class="team-page-hero__text">
                    Благодаря большому опыту и мастерству руководящего состава все компании работают как слаженная команда
                    профессионалов, ведомая единой целью — удовлетворение интересов любимого потребителя.
                </p>
            </div>
        </section>


        <section class="team-page__wrap">
            <div class="container">
                <div class="team-page__inner">
                    @foreach ($data as $item)
                        <div class="people-card director-slide">
                            <div class="people-card__image parallax">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            </div>

                            <div class="director-slide__info">
                                <div class="">
                                    <h4 class="director-slide__title">{{ $item['title'] }}</h4>
                                    <p class="director-slide__position">{{ $item['title'] }}</p>
                                </div>

                                <x-ui.plus />

                            </div>

                            <div class="director-slide__drop">
                                <div class="director-slide__drop_inner">
                                    <div class="director-slide__drop_item">
                                        <p>Телефон:</p>
                                        <a href="tel:+7 (861) 999-99-99">+7 (861) 999-99-99</a>
                                    </div>
                                    <div class="director-slide__drop_item">
                                        <p>Email:</p>
                                        <a href="mailto:admin@gk-stroygrad.ru">admin@gk-stroygrad.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <x-section.work-for-you />

        <section class="spacer"></section>
    </main>
@endsection
