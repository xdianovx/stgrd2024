<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Light Logo-->
        <a href="{{ route('admin.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logo-sm.svg') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo-light.svg') }}" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $pages_routes)) active @endif"
                        href="{{ route('admin.pages.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-book-open-page-variant"></i> <span
                            data-key="t-layouts">{{ __('admin.aside_title_page') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $blocks_routes) ||
                      in_array(Route::current()->getName(), $advantages_routes) ||
                      in_array(Route::current()->getName(), $nums_routes) ||
                      in_array(Route::current()->getName(), $company_routes) ||
                      in_array(Route::current()->getName(), $reviews_routes)) active @endif"
                        href="{{ route('admin.blocks.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-border-all"></i> <span
                            data-key="t-layouts">{{ __('admin.aside_title_blocks') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $managements_routes)) active @endif"
                      href="{{ route('admin.managements.index') }}" aria-expanded="false"
                      aria-controls="sidebarLayouts">
                      <i class="mdi mdi-human-queue"></i> <span data-key="t-layouts">{{__('admin.aside_title_managements')}}</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $vacancies_routes)) active @endif"
                      href="{{ route('admin.vacancies.index') }}" aria-expanded="false"
                      aria-controls="sidebarLayouts">
                      <i class="mdi mdi-chair-rolling"></i> <span data-key="t-layouts">{{__('admin.aside_title_vacancies')}}</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $contact_routes)) active @endif"
                      href="{{ route('admin.contacts.index') }}" aria-expanded="false"
                      aria-controls="sidebarLayouts">
                      <i class="mdi mdi-contacts"></i> <span data-key="t-layouts">{{__('admin.aside_title_contacts')}}</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $cities_routes)) active @endif"
                      href="{{ route('admin.cities.index') }}" aria-expanded="false"
                      aria-controls="sidebarLayouts">
                      <i class="mdi mdi-city-variant-outline"></i> <span data-key="t-layouts">{{ __('admin.aside_title_city') }}</span>
                  </a>
              </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $news_routes)) active @endif"
                        href="{{ route('admin.news.index') }}" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="mdi mdi-newspaper-variant-outline"></i> <span data-key="t-layouts">{{__('admin.aside_title_news')}}</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $projects_routes) ||
                            in_array(Route::current()->getName(), $statuses_routes) ||
                            in_array(Route::current()->getName(), $planning_solution_routes)) active @endif"
                        href="#sidebarBonusCard" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $projects_routes) ||
                                in_array(Route::current()->getName(), $statuses_routes)||
                                in_array(Route::current()->getName(), $planning_solution_routes)) true @else false @endif"
                        aria-controls="sidebarBonusCard">
                        <i class="mdi mdi-projector-screen-outline"></i> <span
                            data-key="t-dashboards">{{ __('admin.aside_title_projects') }}</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $projects_routes) ||
                            in_array(Route::current()->getName(), $statuses_routes) ||
                            in_array(Route::current()->getName(), $planning_solution_routes)) show @endif"
                        id="sidebarBonusCard">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.statuses.index') }}"
                                    class="nav-link @if (in_array(Route::current()->getName(), $statuses_routes)) active @endif"
                                    data-key="t-analytics">
                                    {{ __('admin.aside_title_status') }}</a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $projects_routes) ||
                                in_array(Route::current()->getName(), $planning_solution_routes)) active @endif"
                                  href="{{ route('admin.projects.index') }}" aria-expanded="false"
                                  aria-controls="sidebarLayouts">
                                  <span data-key="t-layouts">{{ __('admin.aside_title_projects') }}</span>
                              </a>
                          </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $promotions_routes)) active @endif"
                      href="{{ route('admin.promotions.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                      <i class="mdi mdi-sale"></i> <span
                          data-key="t-layouts">{{ __('admin.aside_title_promotions') }}</span>
                  </a>
              </li>

              <li class="nav-item">
                <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $news_routes)) active @endif"
                    href="{{ route('admin.news.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-newspaper-variant"></i> <span
                        data-key="t-layouts">{{ __('admin.aside_title_news') }}</span>
                </a>
            </li>
                {{--
                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $game_types_routes) || in_array(Route::current()->getName(), $games_routes))
                            active @endif" href="#sidebarGames" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $game_types_routes) || in_array(Route::current()->getName(), $games_routes))
                        true @else false @endif" aria-controls="sidebarGames">
                        <i class="ri-gamepad-line"></i> <span data-key="t-dashboards">Games</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $game_types_routes) || in_array(Route::current()->getName(), $games_routes)) show @endif" id="sidebarGames">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.game_types.index') }}"
                                class="nav-link   @if (in_array(Route::current()->getName(), $game_types_routes)) active @endif" data-key="t-analytics">
                                    Game Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.games.index') }}"
                                 class="nav-link  @if (in_array(Route::current()->getName(), $games_routes)) active @endif" data-key="t-analytics">
                                    Games</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link
                    @if (in_array(Route::current()->getName(), $certificates_routes) || in_array(Route::current()->getName(), $licenses_routes))
                        active @endif" href="#sidebarCertificates&Licenses" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $certificates_routes) || in_array(Route::current()->getName(), $licenses_routes))
                        true @else false @endif"
                        aria-controls="sidebarCertificates&Licenses">
                        <i class="mdi mdi-certificate-outline"></i> <span data-key="t-dashboards">Certificates & Licenses</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $certificates_routes) || in_array(Route::current()->getName(), $licenses_routes)) show @endif" id="sidebarCertificates&Licenses">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link  @if (in_array(Route::current()->getName(), $certificates_routes)) active @endif"
                                    href="{{ route('admin.certificates.index') }}" aria-expanded="false"
                                    aria-controls="sidebarLayouts">
                                     <span data-key="t-layouts">Certificates</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (in_array(Route::current()->getName(), $licenses_routes)) active @endif"
                                    href="{{ route('admin.licenses.index') }}" aria-expanded="false"
                                    aria-controls="sidebarLayouts">
                                     <span data-key="t-layouts">Licenses</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $category_help_centers_routes) || in_array(Route::current()->getName(), $help_centers_routes))
                            active @endif" href="#sidebarHelp" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $category_help_centers_routes) || in_array(Route::current()->getName(), $help_centers_routes))
                        true @else false @endif" aria-controls="sidebarHelp">
                        <i class="ri-file-info-line"></i> <span data-key="t-dashboards">Help Center</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $category_help_centers_routes) || in_array(Route::current()->getName(), $help_centers_routes)) show @endif" id="sidebarHelp">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.category_help_centers.index') }}"
                                class="nav-link   @if (in_array(Route::current()->getName(), $category_help_centers_routes)) active @endif" data-key="t-analytics">
                                Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.help_centers.index') }}"
                                 class="nav-link  @if (in_array(Route::current()->getName(), $help_centers_routes)) active @endif" data-key="t-analytics">
                                 Articles</a>
                            </li>

                        </ul>
                    </div>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
