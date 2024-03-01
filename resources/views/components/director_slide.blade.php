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
</div>
