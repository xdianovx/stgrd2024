@extends('layouts.main')

@section('content')
    <main class="singlenews" data-barba="container" data-barba-namespace="singlenews">
        {{ Breadcrumbs::render('news.show', $item->slug) }}

        <section class="singlenews-hero">
            <div class="container">
                <h2 class="singlenews__title">{{ $item['title'] }}</h2>
                <p class="singlenews__date">{{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') }}</p>
            </div>


            <div class="parallax singlenews-img">
                <img class="" src="{{ Storage::url($item['image']) }}" alt="{{ $item['title'] }}">
            </div>


            <div class="container">
                <p class="singlenews__description">{{ $item['description'] }}</p>

                <div class="content">
                    {!! $item['content'] !!}
                </div>

                {{-- <x-ui.socials class="singlenews-socials" /> --}}
            </div>
        </section>

        <x-section.news-slider :data="$news" />
        <section class="spacer"></section>
    </main>
@endsection
