@php
    $data = [
        [
            'type' => 'Филиал',
            'city' => 'Ростов-на-Дону',
            'phones' => ['8 (8652) 23 01 33'],
            'address' => 'г. Ставрополь, ул. Чапаева, 4/1',
        ],
        [
            'type' => 'Филиал',
            'city' => 'Краснодар',
            'phones' => ['8 (8652) 23 01 33'],
            'address' => 'г. Ставрополь, ул. Чапаева, 4/1',
        ],
        [
            'type' => 'Филиал',
            'city' => 'Новоросийск',
            'phones' => ['8 (8652) 23 01 33'],
            'address' => 'г. Ставрополь, ул. Чапаева, 4/1',
        ],
        [
            'type' => 'Филиал',
            'city' => 'Воронеж',
            'phones' => ['8 (8652) 23 01 33'],
            'address' => 'г. Ставрополь, ул. Чапаева, 4/1',
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    <main class="contacts">
        <section class="breadcrumbs">
            <div class="container">
                <div class="">breadcrumbs</div>
            </div>
        </section>
        <section class="contacts__hero">
            <div class="container">
                <div class="contacts__hero_wrap">
                    <p>Главный офис</p>
                    <div class="contacts__title_wrap">
                        <h1 class="contacts__title">Ставрополь</h1>
                        <p>Pin</p>
                    </div>
                </div>
            </div>
            <div class="hr"></div>
            {{-- Info row --}}

            <div class="hero__info">
                <div class="container">
                    <div class="hero__info_wrap">
                        <h3 class="hero__info_title">Отдел продаж</h3>

                        <div class="hero__info_item">
                            <p class="hero__info_item_label">Адрес:</p>
                            <div class="hero__info_item_wrap">
                                <p>г. Ставрополь, ул. Чапаева, 4/1</p>
                            </div>
                        </div>

                        <div class="hero__info_item">
                            <p class="hero__info_item_label">Телефон:</p>
                            <div class="hero__info_item_wrap">
                                <a href="tel:8 (8652)-23-90-33">8 (8652)-23-90-33</a>
                                <a href="tel:8 (918) 948-85-92">8 (918) 948-85-92</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr"></div>
            </div>

            {{-- Info row --}}
            <div class="hero__info">
                <div class="container">
                    <div class="hero__info_wrap">
                        <h3 class="hero__info_title">Представительство</h3>

                        <div class="hero__info_item">
                            <p class="hero__info_item_label">Адрес:</p>
                            <div class="hero__info_item_wrap">
                                <p>г. Ставрополь, ул. Чапаева, 4/1</p>
                            </div>
                        </div>

                        <div class="hero__info_item">
                            <p class="hero__info_item_label">Телефон:</p>
                            <div class="hero__info_item_wrap">
                                <a href="tel:8 (8652) 23 01 33">8 (8652) 23 01 33</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr"></div>
            </div>
        </section>

        <section class="contacts__list">
            @foreach ($data as $item)
                <x-contacts_item :type="$item['type']" :city="$item['city']" :phones="$item['phones']" :address="$item['address']" />
            @endforeach
            <div class="container"></div>
        </section>




        <section class="cooperate">
            <div class="container">
                <div class="cooperate__wrap">
                    <div>
                        <x-ui.suptitle>Сотрудничество</x-ui.suptitle>
                    </div>

                    <div class="cooperate__right">
                        <x-ui.text size="md">
                            Приглашаем к сотрудничеству агентства недвижимости и независимых риелторов!
                        </x-ui.text>

                        <p class="cooperate__subtitle">Мы за прочные и взаимовыгодные отношения</p>

                        <form action="" class="cooperate-form">
                            <x-ui.input required label="Компания" id="company" name="company" type="text" />
                            <x-ui.input required label="Контактное лицо" id="user" name="user" type="text" />
                            <x-ui.input required label="Телефон" id="phone" name="phone" type="text" />
                            <x-ui.input required label="Email" id="email" name="email" type="text" />

                            <div class="subscribe-form__bottom">
                                <p>Оставляя заявку, вы даете согласие на обработку персональных данных.</p>
                                <button type="submit" class="subscribe-form__btn"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section class="spacer"></section>
    </main>
@endsection
