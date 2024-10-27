<section class="navigation">
  <div class="container">
      {{-- Header --}}
      <div class="navigation__header">
          <a href="/" class="navigation__logo">
              <svg width="72rem" height="33rem" viewBox="0 0 73 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.546875" y="0.96875" width="8.15576" height="33.8737" fill="#ffffff" />
                  <path d="M34.7812 0.96875L27.6827 9.03866L0.547195 9.03866L0.547195 0.968749L34.7812 0.96875Z"
                      fill="#ffffff" />
                  <path d="M38.3125 0.96875L45.9145 0.96875L45.7107 27.6394L38.3125 34.8425L38.3125 0.96875Z"
                      fill="#ffffff" />
                  <path
                      d="M72.5469 0.96875L63.9223 9.41568L45.0591 9.03392L42.693 6.29888L38.3128 0.968749L72.5469 0.96875Z"
                      fill="#ffffff" />
                  <path d="M27.6827 26.7588L34.7812 34.8287L0.547195 34.8287L0.547195 26.7588L27.6827 26.7588Z"
                      fill="#ffffff" />
              </svg>
          </a>

          <div class="navigation__logo-mob">
              <svg width="41" height="20" viewBox="0 0 41 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.671875" y="0.703125" width="4.55199" height="18.906" fill="#ffffff" />
                  <path d="M19.7812 0.703125L15.8193 5.20721L0.674108 5.20721L0.674109 0.703124L19.7812 0.703125Z"
                      fill="#ffffff" />
                  <path d="M21.75 0.703125L25.9929 0.703125L25.8792 15.5889L21.75 19.6091L21.75 0.703125Z"
                      fill="#ffffff" />
                  <path
                      d="M40.8594 0.703125L36.0457 5.41763L25.5176 5.20456L24.1969 3.67804L21.7522 0.703124L40.8594 0.703125Z"
                      fill="#ffffff" />
                  <path d="M15.8193 15.1035L19.7812 19.6076L0.674108 19.6076L0.674109 15.1035L15.8193 15.1035Z"
                      fill="#ffffff" />
              </svg>
          </div>

          <div class="ml-auto navigation__close">
              <svg width="34rem" height="34rem" viewBox="0 0 34 34" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <line x1="1.64645" y1="32.9257" x2="33.6464" y2="0.925745" stroke="white" />
                  <line y1="-0.5" x2="45.2548" y2="-0.5"
                      transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 32.3906 33.2793)" stroke="white" />
              </svg>
          </div>
      </div>


      <div class="navigation__inner">

          {{-- Wrap --}}
          <div class="navigation__wrap">
              <div class="navigation__left">
                  <nav class="navigation__nav dimm">
                      <a href="/about" class="navigation__link rotate">О компании</a>
                      <a href="/team" class="navigation__link rotate">Руководство</a>
                      <a href="/projects" class="navigation__link rotate">Проекты</a>
                      <a href="/news" class="navigation__link rotate">Новости</a>
                  </nav>
              </div>
              <div class="navigation__right">
                  <div class="navigation__right_links">
                      <a href="/vacancy" class="rotate">Вакансии</a>
                      <a href="/contacts" class="rotate">Контакты</a>
                  </div>
                  <div class="navigation__cities">
                      @if ($all_cities->isNotEmpty())
                          @foreach ($all_cities as $city)
                              @if ($loop->count > 1)
                                  {{$city->title}} /
                              @else
                                  {{$city->title}}
                              @endif
                          @endforeach
                      @endif
                  </div>
              </div>
          </div>


          {{-- bottom --}}

          <div class="navigation__bottom">
              <div class="navigation__bottom_contacts">
                  <a href="mailto:info@stroygrad.ru" сlass="rotate">{{ $main_info->email }}</a>
                  <a href="tel:+7 (8652)-23-90-33" сlass="rotate">{{ $main_info->phone }}</a>
              </div>

              <div class="navigation__work">
                  Работаем каждый день
                  <br>
                {{ $main_info->work_time }}
              </div>
          </div>
      </div>
  </div>
</section>
