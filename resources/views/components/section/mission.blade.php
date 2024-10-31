@props(['nobtn' => false, 'item'])

@if ($item->active == true)
    <section class="mission">
        <div class="container">
            <div class="wrap">
                <div class="right">


                    <x-ui.suptitle>{{ $item->title_left }}</x-ui.suptitle>

                    @if ($nobtn)
                    @else
                        <x-ui.square_btn href="/about" class="pin-btn-mission">Подробнее</x-ui.square_btn>
                    @endif
                </div>
                <div class="left">
                    <x-ui.text size="md">
                        {{ $item->text_large }}
                    </x-ui.text>

                    <div class="text-wrap">
                        <p>{!! $item->description !!}</p>

                        <p>{!! $item->description_additional !!}</p>
                    </div>

                    <div class="cards">
                        @foreach ($item->numbers->sortBy('id') as $nums)
                            <x-mission_card :title="$nums['title']" :num="$nums['num']" :num_text="$nums['num_text']" />
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endif
