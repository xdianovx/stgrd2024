@if ($item->active == true)
    <section class="features">

        <div class="container">
            <div class="features__top">
                <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>
                <div>

                    <x-ui.text size="md">
                        {{ $item->text_large }}
                    </x-ui.text>

                    <p class="features__discription">{{ $item->description }}</p>
                </div>
            </div>
        </div>

    </section>

    <div class="features__cards dimm">
        <div class="image-container">
            <img src="" alt="" />
        </div>

        @foreach ($item->advantages->sortBy('id') as $advantage)
            <x-feature_row :num="$advantage['num']" :title="$advantage['title']" :image="$advantage['image']" :description="$advantage['description']" />
        @endforeach
    </div>
    </section>
@endif
