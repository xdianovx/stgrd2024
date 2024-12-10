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
                        {{--
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

                                    <div class="select-item" data-city="all">Все города</div>
                                    @foreach ($cities as $city)
                                        <div class="select-item" data-city="{{ $city['slug'] }}">{{ $city['title'] }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}

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
                                            <a class="link" data-micromodal-trigger="modal-2">Откликнуться</a>
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
                        <div class="modal micromodal-slide" id="modal-{{ $vacancy->id + 1 }}" aria-hidden="true">
                            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                <div class="modal__container" role="dialog" aria-modal="true">
                                    <div class="modal__top">
                                        <p class="modal__title">
                                            Оставьте заявку
                                        </P>
                                        <button class="modal__close" data-micromodal-close>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px"
                                                viewBox="0 0 24 24" fill="none">
                                                <script xmlns=""
                                                    src="chrome-extension://hoklmmgfnpapgjgcpechhaamimifchmp/frame_ant/frame_ant.js" />
                                                <script xmlns="" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z"
                                                    fill="#0F1729" />
                                                <script xmlns="" />
                                            </svg></button>
                                    </div>


                                    <main class="modal__content" id="modal-1-content">
                                        <form action="{{ route('request_vacancy_section') }}" method="post"
                                            class="modal__form">
                                            @csrf
                                            <div class="form-input">
                                                <input required="required" name="name" type="text" id="name">
                                                <label for="name">Имя</label>
                                            </div>
                                            <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                                            <div class="form-input">
                                                <input required="required" name="phone" type="tel" id="phone">
                                                <label for="phone">Телефон</label>
                                            </div>
                                            <button class="modal__btn" type="submit">Отправить</button>
                                        </form>
                                    </main>

                                </div>
                            </div>
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
                                <div class="team-reviews__item_media" data-cursor-text="Смотреть">
                                    <div class="team-reviews__item_img">
                                        <img src="{{ Storage::url($item['photo']) }}" alt="{{ $item['title'] }}">
                                    </div>

                                    <div class="team-reviews__item_video">
                                        <video>
                                            <source src="{{ URL::to('/') . Storage::url($item['video']) }}" type="video/mp4">
                                        </video>
                                    </div>
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

    {{-- <script>
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
    </script> --}}
@endsection
