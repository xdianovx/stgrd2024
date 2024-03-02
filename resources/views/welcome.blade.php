@extends('layouts.main')

@section('content')
    <main data-barba="container" data-barba-namespace="home">
        <x-section.hero />
        <x-section.video />
        <x-section.mission />
        <x-section.projects />
        <x-section.offers_slider />
        <x-section.marquee />
        <x-section.features />
        <x-section.life />
        <x-section.connect />
    </main>
@endsection
