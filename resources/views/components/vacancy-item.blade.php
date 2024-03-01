@props(['title', 'city', 'expirience', 'salary', 'slug', 'duties', 'terms', 'reqs'])
<div class="vacancy-item">
    <div class="container">
        <div class="vacancy-item__wrap">
            <div class="vacancy-item__tab">
                <h3 class="vacancy-item__title">{{ $title }}</h3>
                <p>{{ $city }}</p>
                <p>{{ $expirience }}</p>
                <p>{{ $salary }}</p>
                <div>
                    <x-ui.link href="/vacancy/{{ $slug }}">Откликнуться</x-ui.link>
                </div>
                <div>
                    <x-ui.plus class="ml-auto" />
                </div>
            </div>
            <div class="vacancy-item__content"></div>
        </div>
    </div>
    <div class="hr"></div>
</div>
