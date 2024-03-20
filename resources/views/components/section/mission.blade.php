

@if ($item->active == TRUE)
<section class="mission">
    <div class="container">
        <div class="wrap">
            <div class="right">
                <x-ui.suptitle>{{$item->title_left}}</x-ui.suptitle>
                <x-ui.square_btn>Подробнее</x-ui.square_btn>
            </div>
            <div class="left">
                <x-ui.text size="md">
                  {{$item->text_large}}
                </x-ui.text>

                <div class="text-wrap">
                    <p>{{$item->description}}</p>

                    <p>{{$item->description_additional}}</p>
                </div>

                <div class="cards">
                    @foreach ($item->numbers()->get() as $nums)
                        <x-mission_card :title="$nums['title']" :num="$nums['num']" :num_text="$nums['num_text']" />
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endif
