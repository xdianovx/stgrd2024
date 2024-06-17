@props(['num', 'title', 'image', 'description'])

<div class="feature-row" data-image="{{ asset($image) }}">
    <div class="container">
        <div class="feature-row__wrap">
            <div class="feature-row__top">
                <div class="feature-row__num">{{ $num }}</div>
                <div class="feature-row__right">
                    <h3 class="feature-row__title">{{ $title }}</h3>
                    <x-ui.plus class="ml-auto" />
                </div>
            </div>

            <div class="feature-row__content">
                <p>{{ $description }}</p>
            </div>
        </div>
    </div>

    <div class="hr"></div>
</div>
