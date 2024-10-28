<section class="projects">
    <div class="container">
        <div class="projects-top">
            <x-ui.title tag='h2' class="uppercase">Наши <br> проекты</x-ui.title>
        </div>

        <div class="big-card">
            <div class="big-card__image parallax">
                <img src="{{ Storage::url($projects->first()->image) }}" alt="{{ $projects->first()->title }}">
            </div>

            <div class="big-card__info">
                <h3 class="big-card__title">{!! $projects->first()->title !!}</h3>
                <p class="big-card__description">{{ $projects->first()->description }}</p>

                <div class="big-card__info_col">
                    <p>{{ $projects->first()->city->title }}</p>
                    <p>Заселение до {{ $projects->first()->year_delivery }}</p>
                </div>

                <div class="big-card__info_link">
                    <x-ui.link href='{{ $projects->first()->link }}' target="_blank">от
                        {{ $projects->first()->planningSolutions->min('price') }} млн.
                        руб.</x-ui.link>
                </div>
            </div>
        </div>
    </div>
</section>
