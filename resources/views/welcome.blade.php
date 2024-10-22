@extends('layouts.main')

@section('content')
    <main data-barba="container" data-barba-namespace="home">
        <x-section.hero :item="$page" />
        @if (!empty($page->video_preview) || !empty($page->video_in_player))
            <x-section.video :item="$page" />
        @endif
        @if ($block_missions->active == TRUE)
        <x-section.mission :item="$block_missions" />
        @endif
        <x-section.projects />
        <x-section.offers_slider />
        <x-section.marquee />
        @if ($block_advantages->active == TRUE)
        <x-section.features :item="$block_advantages" />
        @endif
        <x-section.life />
        <x-section.connect />
    </main>
@endsection
