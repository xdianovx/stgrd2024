@props(['title', 'cart_content', 'image' => '', 'slug'])

<a href="/promotions/{{ $slug }}" class="offer-slide" data-cursor-text="Swipe">
    @if ($image)
        <img class="offer-slide__image" src="{{ Storage::url($image) }}" alt="{{ $title }}">
    @endif
    <div class="offer-slide__inner">
        <h4 class="offer-slide__title">{!! $title !!}</h4>
        <div class="hr"></div>
        <p class="offer-slide__description">{!! $cart_content !!}</p>
    </div>

</a>
