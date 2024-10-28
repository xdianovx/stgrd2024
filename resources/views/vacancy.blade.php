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

                        <div class="select ">
                            <div class="select-title">
                                <p>{{ $cities->first()['title'] }}</p>

                                <svg class="select-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none"
                                    stroke="#1F1F1F" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="1.11359" y1="0.935151" x2="9.74567" y2="9.27105" />
                                    <line x1="9.08173" y1="9.27011" x2="17.7138" y2="0.934211" />
                                </svg>
                            </div>
                            <div class="select-list ">
                                <div class="select-list__wrap">

                                    @foreach ($cities as $city)
                                        <div class="select-item" data-city="{{ $city['slug'] }}">{{ $city['title'] }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="actual-vacancy__wrap">
                <div class="actual-vacancy__head"></div>
                <div class="hr"></div>
                <div class="actual-vacancy__list dimm">
                    @forelse ($vacancies as $vacancy)
                        <div class="vacancy-item">
                            <div class="container">
                                <div class="vacancy-item__wrap">
                                    <div class="vacancy-item__tab">
                                        <h3 class="vacancy-item__title">{{ $vacancy->title }}</h3>
                                        <p class="vacancy-item__city">{{ $vacancy->city->title }}</p>
                                        <p class="vacancy-item__expirience">{{ $vacancy->expirience }}</p>
                                        <p class="vacancy-item__salary">{{ $vacancy->salary }}</p>
                                        <div class="vacancy-item__link">
                                            <x-ui.link href="/vacancy/{{ $vacancy->slug }}">Откликнуться</x-ui.link>
                                        </div>
                                        <div>
                                            <x-ui.plus class="ml-auto" />
                                        </div>
                                    </div>
                                    <div class="vacancy-item__content">
                                        <div class="vacancy-item__content_inner">
                                            <div class="vacancy-item__content-mob">
                                                <p class="vacancy-item__city">{{ $vacancy->city->title }}</p>
                                                <p class="vacancy-item__expirience">{{ $vacancy->expirience }}</p>
                                                <p class="vacancy-item__salary">{{ $vacancy->salary }}</p>
                                            </div>
                                            @if ($vacancy->duties)
                                                <div class="vacancy-item__content_item">
                                                    <h4>Обязанности</h4>{!! $vacancy->duties !!}
                                                </div>
                                            @endif

                                            @if ($vacancy->terms)
                                                <div class="vacancy-item__content_item">
                                                    <h4>Условия</h4>{!! $vacancy->terms !!}
                                                </div>
                                            @endif

                                            @if ($vacancy->reqs)
                                                <div class="vacancy-item__content_item">
                                                    <h4>Требования</h4>{!! $vacancy->reqs !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr"></div>
                        </div>
                    @empty
                        <div class="vacancy-item">
                            <div class="container">
                                <div class="vacancy-item__wrap">
                                    <div class="vacancy-item__tab">
                                        <h3 class="vacancy-item__title">Ничего не найдено</h3>
                                    </div>
                                </div>
                                <div class="hr"></div>
                            </div>
                    @endforelse
                </div>
            </div>
        </section>
        @if ($block_review->active == true)
            <section class="team-reviews">
                <div class="container">
                    <div class="team-reviews__top">
                        <h2 class="team-reviews__title">{{ $block_review->title_left }}</h2>
                    </div>
                </div>

                <div class="hr"></div>

                <div class="container">
                    <div class="team-reviews__wrap ">
                        @foreach ($reviews as $item)
                            <div class="team-reviews__item">
                                <div class="team-reviews__item_img">
                                    <img src="{{ Storage::url($item['photo']) }}" alt="">
                                </div>

                                <h3>{!! $item['title'] !!}</h3>
                                <p class="team-reviews__item_position">{{ $item['position'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <x-cooperate-form />
        <section class="spacer"></section>
    </main>
    <script>
        const selectCity = document.querySelector('.select');
        const selectItems = document.querySelectorAll('.select-item');

        selectCity.addEventListener('click', function(e) {
            if (e.target.classList.contains('select-item')) {
                const citySlug = e.target.getAttribute('data-city');
                const url = `/vacancy/${citySlug}`;
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.querySelector('.actual-vacancy__wrap').innerHTML = data;
                    });
            }
        });
    </script>
@endsection
