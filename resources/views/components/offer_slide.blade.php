@props(['title', 'description', 'image' => '', 'slug'])

<a :href="$slug" class="offer-slide">
    @if ($image)
        <img class="offer-slide__image" src="{{ $image }}" alt="{{ $title }}">
    @endif
    <div class="offer-slide__inner">
        <h4 class="offer-slide__title">{!! $title !!}</h4>
        <div class="hr"></div>
        <p class="offer-slide__description">{!! $description !!}</p>
    </div>

</a>
