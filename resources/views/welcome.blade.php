@extends('layouts.main')

@section('content')
    <main data-barba="container" data-barba-namespace="home">
        <x-section.hero :item="$page" />
        <x-section.video :item="$page" />
        <x-section.mission :item="$block_missions" />
        <x-section.projects />
        <x-section.offers_slider />
        <x-section.marquee />
        <x-section.features :item="$block_advantages" />
        <x-section.life />
        <x-section.connect />
    </main>
@endsection
