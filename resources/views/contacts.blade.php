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
  <main class="contacts" data-barba="container" data-barba-namespace="contacts">
    <section class="breadcrumbs">
      <div class="container">
        {{ Breadcrumbs::render('contacts') }}
      </div>
    </section>
    <section class="contacts__hero">
      <div class="container">
        <div class="contacts__hero_wrap">
          <p>Главный офис</p>
          <div class="contacts__title_wrap">
            <h1 class="contacts__title">Ставрополь</h1>
            <x-ui.circle-btn class="--pin">
              <svg width="19rem" height="26rem" viewBox="0 0 19 26" fill="#767676">
                <path
                  d="M1.67716 10.2687C1.67716 8.14892 2.47231 6.11599 3.88769 4.61709C5.30307 3.11819 7.22274 2.27612 9.22439 2.27612C11.226 2.27612 13.1457 3.11819 14.5611 4.61709C15.9765 6.11599 16.7716 8.14892 16.7716 10.2687C16.7716 13.5474 14.2944 17.8208 9.22439 22.9396C4.15433 17.8208 1.67716 13.5474 1.67716 10.2687ZM9.22439 25.3657C15.3745 19.4459 18.4488 14.4124 18.4488 10.2687C18.4488 7.67787 17.4769 5.19316 15.747 3.36118C14.0171 1.5292 11.6708 0.5 9.22439 0.5C6.77793 0.5 4.43167 1.5292 2.70176 3.36118C0.971852 5.19316 0 7.67787 0 10.2687C0 14.4124 3.07424 19.4459 9.22439 25.3657Z"
                  />
                <path
                  d="M9.22439 12.6345C8.52908 12.6345 7.86225 12.3515 7.37059 11.8479C6.87893 11.3443 6.60272 10.6612 6.60272 9.94898C6.60272 9.23674 6.87893 8.55367 7.37059 8.05005C7.86225 7.54642 8.52908 7.26348 9.22439 7.26348C9.9197 7.26348 10.5865 7.54642 11.0782 8.05005C11.5698 8.55367 11.8461 9.23674 11.8461 9.94898C11.8461 10.6612 11.5698 11.3443 11.0782 11.8479C10.5865 12.3515 9.9197 12.6345 9.22439 12.6345ZM9.22439 14.4248C10.3832 14.4248 11.4946 13.9533 12.3141 13.1139C13.1335 12.2745 13.5938 11.136 13.5938 9.94898C13.5938 8.76192 13.1335 7.62347 12.3141 6.78409C11.4946 5.94471 10.3832 5.47315 9.22439 5.47315C8.06554 5.47315 6.95415 5.94471 6.13472 6.78409C5.31529 7.62347 4.85494 8.76192 4.85494 9.94898C4.85494 11.136 5.31529 12.2745 6.13472 13.1139C6.95415 13.9533 8.06554 14.4248 9.22439 14.4248Z"
                  />
              </svg>
            </x-ui.circle-btn>
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
        <x-contacts_item :type="$item['type']" :city="$item['city']" :phones="$item['phones']"
                         :address="$item['address']"/>
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
              <x-ui.input required label="Компания" id="company" name="company" type="text"/>
              <x-ui.input required label="Контактное лицо" id="user" name="user" type="text"/>
              <x-ui.input required label="Телефон" id="phone" name="phone" type="text"/>
              <x-ui.input required label="Email" id="email" name="email" type="text"/>

              <div class="subscribe-form__bottom">
                <p>Оставляя заявку, вы даете согласие на обработку персональных данных.</p>
                <x-ui.circle-btn type="submit" class="subscribe-form__btn">
                  <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.00390625 5.5C0.951275 5.5 10.3986 5.5 15.0039 5.5M15.0039 5.5L10.2671 0.5M15.0039 5.5L10.2671 10.5" stroke="#6F6F6F"/>
                  </svg>
                </x-ui.circle-btn>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <section class="spacer"></section>
  </main>
@endsection
