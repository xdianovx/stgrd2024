@props(['title', 'position', 'image', 'phone', 'email'])

<div class="director-slide">
    <div class="director-slide__image">
        <img src="{{ Storage::url($image) }}" alt="{{ $title }}">
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
                <a href="tel:{{ $phone }}">{{ $phone }}</a>
            </div>
            <div class="director-slide__drop_item">
                <p>Email:</p>
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
        </div>
    </div>
</div>
