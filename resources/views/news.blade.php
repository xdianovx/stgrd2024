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
                <div class="news-cards --second" id="newsCatalog">
                    @foreach ($news as $item)
                        @if ($loop->index > 6)
                            <x-news_card :slug="'/news/' . $item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
                        @endif
                    @endforeach
                </div>
                @if ($pageCount > 1)
                <div class="news-cards__loadmore">
                    <x-ui.showmore-btn class="showmore" id="show-more-news">Ещё новости</x-ui.showmore-btn>
                </div>
                @endif
            </div>
        </section>
        @if ($pageCount > 1)
        <script>
            let pageCount = Number("{{ $pageCount }}");
            let currentPage = Number("{{ $currentPage }}");

            document.getElementById('show-more-news').addEventListener('click', function(event) {
                event.preventDefault();
                currentPage = currentPage + 1;
                const url = "{{ route('news.loadMore') }}?page=" + currentPage;

                if (currentPage == pageCount) {
                    document.getElementById('show-more-news').style.display = 'none';
                } else {
                    document.getElementById('show-more-news').style.display = 'block';
                }
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('newsCatalog').innerHTML += data;

                    });
            });
        </script>
    @endif
        <x-subscribe />

        <section class="spacer"></section>
    </main>
@endsection
