
@extends('layouts.main')

@section('content')
    <main class="news-page" data-barba="container" data-barba-namespace="news">
        {{ Breadcrumbs::render('promotions') }}

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
                    {{-- <div class="news-catalog__filter">
                        <x-ui.dropdown placeholder="Проект" :list="$status" />
                        <x-ui.dropdown placeholder="Город" :list="$status" />
                        <x-ui.dropdown placeholder="Год" :list="$status" />
                    </div> --}}

                    <div class="news-catalog__filter_count">Найдено: {{$promotions->count()}}</div>
                </div>
            </div>

            <div class="container">
                <div class="news-cards">
                    @foreach ($promotions as $item)
                        @if ($loop->index < 6)
                            <x-news_card :slug="$item['slug']" :title="$item['title']" :description="$item['cart_content']" :created_at="$item['created_at']" />
                        @endif
                    @endforeach
                </div>
            </div>
            @if ($sliderPromotions->isNotEmpty())
            <ul class="news-page__marquee ticker" data-speed="200" data-direction="left">
                <li>
                        @foreach ($sliderPromotions as $item)
                                <p>{{ $item['title'] }}</p>
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
                        @endforeach
                  </li>
              </ul>
              @endif
            <div class="container">
                <div class="news-cards --second">
                    @foreach ($promotions as $item)
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
