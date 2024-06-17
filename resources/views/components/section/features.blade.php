@php
    $data = [
        [
            'num' => '01',
            'title' => 'Клиентоориентированность',
            'image' => 'img/com-1.jpg',
            'description' =>
                'Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную производственную базу, осваивал новые направления бизнеса.',
        ],
        [
            'num' => '02',
            'title' => 'Честность и ответсвенность',
            'image' => 'img/com-1.jpg',
            'description' =>
                'Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную производственную базу, осваивал новые направления бизнеса.',
        ],
        [
            'num' => '03',
            'title' => 'Лидерство и инновации',
            'image' => 'img/com-2.jpg',
            'description' =>
                'Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную производственную базу, осваивал новые направления бизнеса.',
        ],
        [
            'num' => '04',
            'title' => 'Вовлеченность и инициатива',
            'image' => 'img/com-1.jpg',
            'description' =>
                'Все это время «Стройград» стремительно развивался, выходил на новые рынки, наращивал собственную производственную базу, осваивал новые направления бизнеса.',
        ],
    ];
@endphp

@if ($item->active == true)
    <section class="features">

        <div class="container">
            <div class="features__top">
                <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>
                <div>

                    <x-ui.text size="md">
                        {{ $item->text_large }}
                    </x-ui.text>

                    <p class="features__discription">{{ $item->description }}</p>
                </div>
            </div>
        </div>

    </section>

    <div class="features__cards dimm">
        <div class="image-container">
            <img src="" alt="" />
        </div>

        @foreach ($data as $advantages)
            <x-feature_row :num="$advantages['num']" :title="$advantages['title']" :image="$advantages['image']" :description="$advantages['description']" />
        @endforeach
    </div>
    </section>
@endif
