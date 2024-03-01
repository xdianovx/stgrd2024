@props(['slug', 'title', 'description', 'created_at'])

<div class="news-card">
    <h3 class="news-card__title">{!! $title !!}</h3>
    <p class="news-card__text">{!! $description !!}</p>
    <div class="news-card__bottom">
        <p class="news-card__date">{{ $created_at }}</p>
        <x-ui.link href="/news/{{ $slug }}" class="news-card__link">читать</x-ui.link>
    </div>
</div>
