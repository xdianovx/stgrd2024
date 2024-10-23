@extends('layouts.main')

@section('content')
    <main class="about" data-barba="container" data-barba-namespace="about">
        {{ Breadcrumbs::render('about') }}
        <section class="about-hero">
            <div class="container">


                <h1 class="about-title">{{ $page->title }}</h1>

                <div class="about-info">
                    <x-ui.suptitle>{!! $page->text_left !!}</x-ui.suptitle>
                    <x-ui.text size="sm">{!! $page->text_right !!}</x-ui.text>
                </div>
            </div>
        </section>

        <div class="line">
            <div class="hr"></div>
        </div>
        @if ($block_missions->active == TRUE)
        <x-section.mission :nobtn="true" :item="$block_missions" />
        @endif
        <x-section.directors :item="$block_managements" :data="$team"/>

        <div class="line">
            <div class="hr"></div>
        </div>
        @if ($block_advantages->active == TRUE)
        <x-section.features :item="$block_advantages" />
        @endif
        @if ($block_maps->active == TRUE)
        <x-section.map :item="$block_maps"/>
        @endif
        @if ($block_companies->active == TRUE)
        <x-section.enterprises :item="$block_companies"/>
        @endif
        <section class="spacer"></section>
    </main>
@endsection
