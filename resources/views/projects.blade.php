
@extends('layouts.main')

@section('content')
    <main class="projects-page" data-barba="container" data-barba-namespace="projects">
    {{ Breadcrumbs::render('projects') }}
    <section class="projects-page-hero">
        <div class="container">
            <h1 class="projects-page-title">{{ $page->title }}</h1>
        </div>
    </section>

    <section class="projects-page-catalog">
        <div class="container">
            <div class="projects-page-catalog__filter">
                <div class="projects-page-catalog__filter_wrap">
                    <div class="select">
                        <div class="select-title">
                            <p>{{ $cities->first()['title'] }}</p>
                            <svg class="select-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none" stroke="#1F1F1F" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.11359" y1="0.935151" x2="9.74567" y2="9.27105" />
                                <line x1="9.08173" y1="9.27011" x2="17.7138" y2="0.934211" />
                            </svg>
                        </div>
                        <div class="select-list">
                            <div class="select-list__wrap">
                                @foreach ($cities as $city)
                                    <div class="select-item-city" data-city="{{ $city['slug'] }}">{{ $city['title'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="select">
                        <div class="select-title">
                            <p>{{ $statuses->first()['title'] }}</p>
                            <svg class="select-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none" stroke="#1F1F1F" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.11359" y1="0.935151" x2="9.74567" y2="9.27105" />
                                <line x1="9.08173" y1="9.27011" x2="17.7138" y2="0.934211" />
                            </svg>
                        </div>
                        <div class="select-list">
                            <div class="select-list__wrap">
                                @foreach ($statuses as $status)
                                    <div class="select-item-status" data-status="{{ $status['slug'] }}">{{ $status['title'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="select">
                        <div class="select-title">
                            <p>от {{ $projects_planning_solutions[0] }} млн. руб.</p>
                            <svg class="select-arrow" width="19" height="10" viewBox="0 0 19 10" fill="none" stroke="#1F1F1F" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.11359" y1="0.935151" x2="9.74567" y2="9.27105" />
                                <line x1="9.08173" y1="9.27011" x2="17.7138" y2="0.934211" />
                            </svg>
                        </div>
                        <div class="select-list">
                            <div class="select-list__wrap">
                                @foreach ($projects_planning_solutions as $price)
                                    <div class="select-item-price" data-price="{{ $price }}">от {{ $price }} млн. руб.</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <p class="projects-page-catalog__filter_count">Найдено проектов: {{$projects->count()}}</p>
            </div>

            {{-- Big Card Start --}}
             @foreach ($projects_home as $project_home)
            <div class="projects-page-catalog__big_card">
                <div class="projects-page-catalog__big_card_image parallax">
                    <img src="{{ Storage::url($project_home->image) }}" alt="{!! $project_home->title !!}">
                </div>

                <div class="projects-page-catalog__big_card_info">
                    <h4 class="projects-page-catalog__big_card_title">{{ $project_home->title }}</h4>
                    <div class="projects-page-catalog__big_card_col">
                        <p class="projects-page-catalog__big_card_col_city">{{ $project_home->city->title }}</p>
                        <p class="projects-page-catalog__big_card_col_deadline">Год сдачи {{ $project_home->year_delivery }}</p>
                    </div>
                    <p class="projects-page-catalog__big_card_text">{{ $project_home->description }}</p>
                    <p class="projects-page-catalog__big_card_link">
                        <x-ui.link href="{{ $project_home->link }}">от {{ $project_home->planningSolutions->min('price') }} млн. руб.</x-ui.link>
                    </p>
                </div>
            </div>
            @endforeach
            {{-- Big Card End --}}

        </div>

        <div class="projects-page-list">
            @foreach ($projects as $item)
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

            @endforeach
        </div>
        <div class="hr --last"></div>
    </section>

    <section class="spacer"></section>
</main>
<script>
    const selectCities = document.querySelector('.select[data-city]');
    const selectStatuses = document.querySelector('.select[data-status]');
    const selectPrices = document.querySelector('.select[data-price]');

    function getSelectedData(attribute) {
        const selectedItem = document.querySelector('.select-item-' + attribute + '.selected');
        return selectedItem ? selectedItem.getAttribute('data-' + attribute) : null;
    }

    document.querySelectorAll('.select').forEach(select => {
        select.addEventListener('click', function (e) {
            if (e.target.classList.contains('select-item-city') ||
                e.target.classList.contains('select-item-status') ||
                e.target.classList.contains('select-item-price')) {

                document.querySelectorAll('.select-item').forEach(item => item.classList.remove('selected'));
                e.target.classList.add('selected');

                const citySlug = getSelectedData('city');
                const statusSlug = getSelectedData('status');
                const minPrice = getSelectedData('price');

                const url = `/projects/filter?city=${citySlug}&status=${statusSlug}&min_price=${minPrice}`;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        document.querySelector('.projects-page-list').innerHTML = data;
                    });
            }
        });
    });
</script>
@endsection
