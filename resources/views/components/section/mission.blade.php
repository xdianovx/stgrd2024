@php
    $data = [
        [
            'id' => 1,
            'title' => 'Опыт компании',
            'num' => '10',
            'num_text' => 'лет',
        ],
        [
            'id' => 2,
            'title' => 'Во время сданных проектов',
            'num' => '4512',
            'num_text' => '',
        ],
        [
            'id' => 3,
            'title' => 'Построенного жилья',
            'num' => '16',
            'num_text' => '',
        ],
        [
            'id' => 4,
            'title' => 'Заселенных квартир',
            'num' => '20203',
            'num_text' => 'м²',
        ],

    ];
@endphp

<section class="mission">
    <div class="container">
        <div class="wrap">
            <div class="right">
                <x-ui.suptitle>Миссия</x-ui.suptitle>
                <x-ui.square_btn>Подробнее</x-ui.square_btn>
            </div>
            <div class="left">
                <x-ui.text size="md">
                    Мы стремимся стать одним из крупнейших строительно-инвестиционных холдингов
                    федерального и международного уровня.
                </x-ui.text>

                <div class="text-wrap">
                    <p>Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную
                        производственную базу, осваивал новые направления бизнеса.</p>

                    <p>Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную
                        производственную базу, осваивал новые направления бизнеса.</p>
                </div>

                <div class="cards">
                    @foreach ($data as $item)
                        <x-mission_card :title="$item['title']" :num="$item['num']" :num_text="$item['num_text']" />
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
