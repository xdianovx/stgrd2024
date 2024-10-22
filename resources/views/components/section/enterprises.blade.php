
<section class="enterprises">
    <div class="container">
        <div class="enterprises__top">
            <div class="">
                <x-ui.suptitle>{{$item->title_left}}</x-ui.suptitle>
            </div>

            <div class="enterprises__info">
                <x-ui.text size="md" class="">
                  {!! $item->text_large !!}
                </x-ui.text>
                <p class="enterprises__description">{!! $item->description !!}</p>
            </div>
        </div>

    </div>
    <div class="enterprises__wrap">
        <div class="enterprises__head">
            <div class="container">
                <div class="enterprises__head_title">
                    <p>Название компании</p>
                    <p>Сфера деятельности</p>
                    <p>Сайт</p>
                    <p>Год основания</p>
                </div>
            </div>
            <div class="hr"></div>
        </div>
        @foreach ($item->companies->sortBy('id') as $item)
            <x-enterprises_item :title="$item['title']" :site_url="$item['site_url']" :site_title="$item['sphere_activity']" :year="$item['year']"
                :address="$item['address']" :phone="$item['phone']" :email="$item['email']" :text="$item['description']" />
        @endforeach
    </div>
</section>
