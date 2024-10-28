@extends('layouts.main')

@section('content')
    <main data-barba="container" data-barba-namespace="home">
        <x-section.hero :item="$page" />
        @if (!empty($page->video_preview) || !empty($page->video_in_player))
            <x-section.video :item="$page" />
        @endif
        @if ($block_missions->active == true)
            <x-section.mission :item="$block_missions" />
        @endif
        @if ($projects_home->isNotEmpty())
            <x-section.projects :projects="$projects_home" />
        @endif
        @if ($promotions->count() > 0)
            <x-section.offers_slider :promotions="$promotions" />
        @endif
        <x-section.marquee />
        @if ($block_advantages->active == true)
            <x-section.features :item="$block_advantages" />
        @endif
        @if ($block_life_stroygrads->active == true)
            <x-section.life :item="$block_life_stroygrads" />
        @endif
        <x-section.connect />
    </main>
@endsection
