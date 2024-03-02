@extends('layouts.main')

@section('content')
    <main class="news-page">

        <section class="news-page-hero">
            <div class="container">
                <div class="breadcrumbs">breadcrumbs</div>
                <div class="news-page-title__wrap">
                    <h1 class="news-page-title">Новости</h1>
                    <x-ui.link href="/stock">Акции</x-ui.link>
                </div>
            </div>
        </section>

        <x-subscribe />

        <section class="spacer"></section>
    </main>
@endsection
