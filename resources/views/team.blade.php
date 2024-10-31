@extends('layouts.main')

@section('content')
    <main class="team-page" data-barba="container" data-barba-namespace="team">
        {{ Breadcrumbs::render('team') }}
        <section class="team-page-hero">
            <div class="container">
                <h1 class="team-page-title">{{ $page->title }}</h1>

                <p class="team-page-hero__text">{{ $page->text_right }}</p>
            </div>
        </section>


        <section class="team-page__wrap">
            <div class="container">
                <div class="team-page__inner">
                    <div class="">
                        @foreach ($team->filter(fn($item, $key) => $key % 2 == 0) as $item)
                            <div class="people-card director-slide">
                                <div class="people-card__image parallax">
                                    <img src="{{ Storage::url($item['image']) }}" alt="{{ $item->title }}">
                                </div>

                                <div class="director-slide__info">
                                    <div class="">
                                        <h4 class="director-slide__title">{{ $item->title }}</h4>
                                        <p class="director-slide__position">{{ $item->position }}</p>
                                    </div>

                                    <x-ui.plus />

                                </div>

                                <div class="director-slide__drop">
                                    <div class="director-slide__drop_inner">
                                        <div class="director-slide__drop_item">
                                            <p>Телефон:</p>
                                            <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                        </div>
                                        <div class="director-slide__drop_item">
                                            <p>Email:</p>
                                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="" data-speed="1.2">
                        @foreach ($team->filter(fn($item, $key) => $key % 2 != 0) as $item)
                            <div class="people-card director-slide">
                                <div class="people-card__image parallax">
                                    <img src="{{ Storage::url($item['image']) }}" alt="{{ $item->title }}">
                                </div>

                                <div class="director-slide__info">
                                    <div class="">
                                        <h4 class="director-slide__title">{{ $item->title }}</h4>
                                        <p class="director-slide__position">{{ $item->position }}</p>
                                    </div>

                                    <x-ui.plus />

                                </div>

                                <div class="director-slide__drop">
                                    <div class="director-slide__drop_inner">
                                        <div class="director-slide__drop_item">
                                            <p>Телефон:</p>
                                            <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                        </div>
                                        <div class="director-slide__drop_item">
                                            <p>Email:</p>
                                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <x-section.work-for-you :item="$block_vacancies" :vacancies="$vacancies" />

        <section class="spacer"></section>
    </main>
@endsection
