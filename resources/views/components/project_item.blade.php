@forelse ($projects as $item)
<div class="project-item">
  <div class="hr"></div>
  <div class="container">
    <div class="project-item__wrap">
      <div class="project-item__left">
        <div class="project-item__left_top">
          <h3 class="project-item__title">{!! $item->title !!}</h3>
          <div class="">
            <p class="project-item__deadline">Год сдачи: {{ $item->year_delivery }}</p>
            <div class="project-item__city">{{ $item->city->title }}</div>
          </div>
        </div>

        <p class="project-item__text">{!! $item->description !!}</p>

        <div class="project-item__filters">
          <div class="filter --comfort">
            <div class="filter__title">
              <p>Удобства</p>
              <x-ui.plus/>
            </div>
            <div class="filter__content">
              <div class="filter__content_inner">
                @foreach(json_decode($item->comfort, true) as $comfor)
                  <div class="filter__content_item">{{$comfor}}</div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="filter --flats">
            <div class="filter__title">
              <p>{{ $item->number_rooms }} квартир в продаже</p>
              <x-ui.plus/>
            </div>
            <div class="filter__content">
              <div class="filter__content_inner">
                @foreach($item->planningSolutions as $planningSolution)
                  <div class="filter__content_item">
                    <div class="filter__content_item_type">{{$planningSolution['number_rooms']}}</div>
                    <div class="filter__content_item_square">от {{$planningSolution['number_square_meters']}}м²</div>
                    <x-ui.link href="{{ $item->link }}">от {{$planningSolution['price']}} млн. руб.</x-ui.link>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <a href="{{ $item->link }}" class="project-item__btn">Подробнее</a>
      </div>

      <div class="project-item__right">
        <div class="project-item__image parallax --project-card-parallax">
          <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
        </div>
      </div>
      <a href="{{ $item->link }}" class="project-item__btn --mob">Подробнее</a>

    </div>
  </div>
</div>

@empty
<div class="project-item">
  <div class="hr"></div>
  <div class="container">
    <div class="project-item__wrap">
      <div class="project-item__left">
        <div class="project-item__left_top">
          <h3 class="project-item__title">Ничего не найдено</h3>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforelse
