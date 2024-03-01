@props(['title', 'num', 'num_text'])


<div class="mission-card">
    <div class="hr"></div>

    <h4>{{ $title }}</h4>

    <div class="mission-card__wrap">
        <p class="mission-card__num">{{ $num }}</p>
        <span class="mission-card__text">
            {{ $num_text }}
        </span>
    </div>

</div>
