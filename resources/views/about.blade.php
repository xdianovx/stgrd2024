@extends('layouts.main')

@section('content')
    <main class="about">

        <section class="about-hero">
            <div class="container">
                <div class="breadcrumbs">breadcrumbs</div>

                <h1 class="about-title">Строительная компания Стройград</h1>

                <div class="about-info">
                    <x-ui.suptitle>О нас</x-ui.suptitle>
                    <x-ui.text size="sm">Группа компаний «Стройград» начала свою историю в 2006 году со строительства
                        многоквартирного
                        жилого дома в г. Ставрополь. Все это время «Стройград» стремительно развивался, выходил на новые
                        рынки,
                        наращивал собственную производственную базу, осваивал новые направления бизнеса. На сегодняшний день
                        география деятельности группы компаний «Стройград» охватывает две чрезвычайно важные для экономики
                        страны области — Краснодарский и Ставропольский края.</x-ui.text>
                </div>
            </div>
        </section>

        <div class="line">
            <div class="hr"></div>
        </div>

        <x-section.mission />
        <x-section.directors />

        <div class="line">
            <div class="hr"></div>
        </div>

        <x-section.features />
        <x-section.map />
        <x-section.enterprises />
        <section class="spacer"></section>
    </main>
@endsection