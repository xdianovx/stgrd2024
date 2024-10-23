<section class="workforyou">
    <div class="container">
        <div class="workforyou__wrap">
            <div>
                <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>
            </div>

            <div class="workforyou__info">
                <x-ui.text size="md">{{ $item->text_large }} </x-ui.text>
                <p class="workforyou__count">({{ $vacancies->count() }} свободных вакансий)</p>

                <x-ui.link href="/vacancy">Посмотреть вакансии</x-ui.link>
            </div>
        </div>
    </div>
</section>
