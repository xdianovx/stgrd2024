@extends('layouts.main')

@section('content')
    <main class="team-page" data-barba="container" data-barba-namespace="team">
        {{ Breadcrumbs::render('team') }}
        <section class="team-page-hero">
            <div class="container">
                <h1 class="team-page-title">Руководство</h1>

                <p class="team-page-hero__text">
                    Благодаря большому опыту и мастерству руководящего состава все компании работают как слаженная команда
                    профессионалов, ведомая единой целью — удовлетворение интересов любимого потребителя.
                </p>
            </div>
        </section>


        <section class="team-page__wrap">
            <div class="container">
                КАрточки людей допилить
            </div>
        </section>

        <x-section.work-for-you />

        <section class="spacer"></section>
    </main>
@endsection
