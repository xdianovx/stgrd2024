@props(['title', 'deadline', 'city', 'description', 'slug', 'image', 'comfort', 'flats'])

<div class="project-item">
  <div class="hr"></div>
  <div class="container">
    <div class="project-item__wrap">
      <div class="project-item__left">
        <div class="project-item__left_top">
          <h3 class="project-item__title">{!! $title !!}</h3>
          <div class="">
            <p class="project-item__deadline">Год сдачи: {{ $deadline }}</p>
            <div class="project-item__city">{{ $city }}</div>
          </div>
        </div>

        <p class="project-item__text">{!! $description !!}</p>

        <div class="project-item__filters">
          <div class="filter --comfort">
            <div class="filter__title">
              <p>Удобства</p>
              <x-ui.plus/>
            </div>
            <div class="filter__content">
              <div class="filter__content_inner">
                @foreach($comfort as $item)
                  <div class="filter__content_item">{{$item}}</div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="filter --flats">
            <div class="filter__title">
              <p>160 квартир в продаже</p>
              <x-ui.plus/>
            </div>
            <div class="filter__content">
              <div class="filter__content_inner">
                @foreach($flats as $item)
                  <div class="filter__content_item">
                    <div class="filter__content_item_type">{{$item['type']}}</div>
                    <div class="filter__content_item_square">{{$item['square']}}</div>
                    <x-ui.link href="#">{{$item['price']}}</x-ui.link>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <a href="/projects/{{ $slug }}" class="project-item__btn">Подробнее</a>
      </div>

      <div class="project-item__right">
        <div class="project-item__image parallax --project-card-parallax">
          <img src="{{ $image }}" alt="{{ $title }}">
        </div>
      </div>
      <a href="/projects/{{ $slug }}" class="project-item__btn --mob">Подробнее</a>

    </div>
  </div>
</div>
