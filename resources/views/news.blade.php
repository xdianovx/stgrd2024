@extends('layouts.main')

@section('content')
    <main class="news-page" data-barba="container" data-barba-namespace="news">
        {{ Breadcrumbs::render('news') }}

        <section class="news-page-hero">
            <div class="container">
                <div class="news-page-title__wrap">
                    <h1 class="news-page-title">Новости</h1>
                    <x-ui.link href="/promotions">Акции</x-ui.link>
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

                    <div class="news-catalog__filter_count">Найдено: {{ $news->count() }}</div>
                </div>
            </div>

            <div class="container">
                <div class="news-cards">
                    @foreach ($news as $item)
                        @if ($loop->index < 6)
                            <x-news_card :slug="'/news/' . $item['slug']" :title="$item['title']" :description="$item['cart_content']" :created_at="$item['created_at']" />
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="container">
                <div class="news-cards --second">
                    @foreach ($news as $item)
                        @if ($loop->index > 6)
                            <x-news_card :slug="'/news/' . $item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
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
