@props(['title', 'position', 'image', 'phone', 'email'])

<div class="director-slide">
    <div class="director-slide__image">
        <img src="{{ $image }}" alt="{{ $title }}">
    </div>

    <div class="director-slide__info">
        <div class="">
            <h4 class="director-slide__title">{{ $title }}</h4>
            <p class="director-slide__position">{{ $title }}</p>
        </div>

        <x-ui.plus />

    </div>

    <div class="director-slide__drop">
        <div class="director-slide__drop_inner">
            <div class="director-slide__drop_item">
                <p>Телефон:</p>
                <a href="tel:+7 (861) 999-99-99">+7 (861) 999-99-99</a>
            </div>
            <div class="director-slide__drop_item">
                <p>Email:</p>
                <a href="mailto:admin@gk-stroygrad.ru">admin@gk-stroygrad.ru</a>
            </div>
        </div>
    </div>

</div>
