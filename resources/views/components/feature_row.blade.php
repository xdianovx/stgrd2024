@props(['num', 'title', 'image', 'description'])

<div class="feature-row">
    <div class="container">
        <div class="feature-row__wrap">
            <div class="feature-row__top">
                <div class="feature-row__num">{{ $num }}</div>
                <h3 class="feature-row__title">{{ $title }}</h3>
                <x-ui.plus class="ml-auto" />
            </div>
        </div>
    </div>

    <div class="hr"></div>
</div>
