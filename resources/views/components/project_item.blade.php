@props(['title', 'deadline', 'city', 'description', 'slug', 'image', 'comfort', 'flats'])

<div class="project-item">
    <div class="hr"></div>
    <div class="container">
        <div class="project-item__wrap">
            <div class="project-item__left">
                <div class="project-item__left_top">
                    <h3 class="project-item__title">{!! $title !!}</h3>
                    <div class="">
                        <p class="project-item__deadline">Год сдачи: {{ $deadline }}</p>
                        <div class="project-item__city">{{ $city }}</div>
                    </div>
                </div>

                <p class="project-item__text">{!! $description !!}</p>

                <div class="project-item__filters">
                    <p>----</p>
                    <p>----</p>
                </div>

                <a href="/projects/{{ $slug }}" class="project-item__btn">Подробнее</a>
            </div>

            <div class="project-item__right">
                <div class="project-item__image parallax --project-card-parallax">
                    <img src="{{ $image }}" alt="{{ $title }}">
                </div>
            </div>
          <a href="/projects/{{ $slug }}" class="project-item__btn --mob">Подробнее</a>

        </div>
    </div>
</div>
