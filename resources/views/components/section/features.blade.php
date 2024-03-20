

@if ($item->active == TRUE)
<section class="features">
    <div class="container">
        <div class="features__top">
            <x-ui.suptitle>{{$item->title_left}}</x-ui.suptitle>
            <div>

                <x-ui.text size="md">
                  {{$item->text_large}}
                </x-ui.text>

                <p class="features__discription">{{$item->description}}</p>
            </div>
        </div>
    </div>


    <div class="features__cards dimm">
        @foreach ($item->advantages()->get() as $advantages)
            <x-feature_row :num="$advantages['num']" :title="$advantages['title']" :image="$advantages['image']" :description="$advantages['description']" />
        @endforeach
    </div>
</section>
@endif
