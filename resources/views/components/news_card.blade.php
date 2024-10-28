@props(['slug', 'title', 'description', 'created_at'])

<a href="{{ $slug }}" class="news-card">
    <h3 class="news-card__title">{!! $title !!}</h3>
    <p class="news-card__text">{!! $description !!}</p>
    <div class="news-card__bottom">
        <p class="news-card__date">{{ \Carbon\Carbon::parse($created_at)->translatedFormat('d F Y') }}</p>
        <p class="news-card__link">Читать</p>
    </div>
</a>
