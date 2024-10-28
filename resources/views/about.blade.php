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
        @if ($block_missions->active == true)
            <x-section.mission :nobtn="true" :item="$block_missions" />
        @endif
        @if ($block_managements->active == true)
            <x-section.directors :item="$block_managements" :data="$team" />
        @endif
        <div class="line">
            <div class="hr"></div>
        </div>
        @if ($block_advantages->active == true)
            <x-section.features :item="$block_advantages" />
        @endif
        @if ($block_maps->active == true)
            <x-section.map :item="$block_maps" />
        @endif
        @if ($block_companies->active == true)
            <x-section.enterprises :item="$block_companies" />
        @endif
        <section class="spacer"></section>
    </main>
@endsection
