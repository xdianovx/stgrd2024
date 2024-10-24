
@forelse ($vacancies as $vacancy)
<div class="vacancy-item">
  <div class="container">
      <div class="vacancy-item__wrap">
          <div class="vacancy-item__tab">
              <h3 class="vacancy-item__title">{{ $vacancy->title }}</h3>
              <p class="vacancy-item__city">{{ $vacancy->city->title }}</p>
              <p class="vacancy-item__expirience">{{ $vacancy->expirience }}</p>
              <p class="vacancy-item__salary">{{ $vacancy->salary }}</p>
              <div class="vacancy-item__link">
                  <x-ui.link href="/vacancy/{{ $vacancy->slug }}">Откликнуться</x-ui.link>
              </div>
              <div>
                  <x-ui.plus class="ml-auto" />
              </div>
          </div>
          <div class="vacancy-item__content">
              <div class="vacancy-item__content_inner">
                  <div class="vacancy-item__content-mob">
                      <p class="vacancy-item__city">{{ $vacancy->city->title }}</p>
                      <p class="vacancy-item__expirience">{{ $vacancy->expirience }}</p>
                      <p class="vacancy-item__salary">{{ $vacancy->salary }}</p>
                  </div>
                  @if($vacancy->duties)
                      <div class="vacancy-item__content_item">
                          <h4>Обязанности</h4>{{$vacancy->duties}}</div>
                  @endif

                  @if($vacancy->terms)
                      <div class="vacancy-item__content_item">
                          <h4>Условия</h4>{{$vacancy->terms}}</div>
                  @endif

                  @if($vacancy->reqs)
                      <div class="vacancy-item__content_item">
                          <h4>Требования</h4>{{$vacancy->reqs}}</div>
                  @endif
              </div>
          </div>
      </div>
  </div>
  <div class="hr"></div>
</div>
@empty
<div class="vacancy-item">
  <div class="container">
      <div class="vacancy-item__wrap">
          <div class="vacancy-item__tab">
              <h3 class="vacancy-item__title">Ничего не найдено</h3>
            </div>
          </div>
          <div class="hr"></div>
        </div>
@endforelse
