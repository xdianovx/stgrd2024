@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.new_project_card_title') }}</h4>
                    <div class="flex-shrink-0">
                      <div class="dropdown">
                          <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                              aria-expanded="false" class="">
                              <i class="ri-more-2-fill fs-14"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                              <li>
                                  <a type="button" class="dropdown-item" href="{{ route('admin.projects.index') }}">
                                      <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                      {{ __('admin.btn_back') }}</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-border-left alert-dismissible fade show " role="alert">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    @foreach ($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif


            <div class="card">
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_title') }}</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                  <div>
                                      <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" name="home" id="customSwitch1" value="1">
                                          <label class="form-check-label" for="customSwitch1">{{__('admin.field_home')}}</label>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_image') }}</label>
                                    <input type="file" class="form-control" name="image" placeholder="{{ __('admin.placeholder_text') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_year_delivery') }}</label>
                                    <input type="text" class="form-control" name="year_delivery" value="{{ old('year_delivery') }}" placeholder="{{ __('admin.placeholder_text') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_number_rooms') }}</label>
                                    <input type="text" class="form-control" name="number_rooms" value="{{ old('number_rooms') }}" placeholder="{{ __('admin.placeholder_text') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_link') }}</label>
                                    <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="{{ __('admin.placeholder_text') }}">
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                  <div>
                                      <label for="comfortInput" class="form-label">{{ __('admin.field_comfort') }} *</label>
                                      <input type="text" value="{{ old('comfort.0') }}" class="form-control"
                                          id="comfortInput" name="comfort[]" placeholder="{{ __('admin.placeholder_text') }}">
                                      <div id="comforts">
                                          @if (old('comfort'))
                                              @foreach (old('comfort') as $key => $comfort)
                                                  @if ($key > 0)
                                                      <div class="mt-2">
                                                          <input type="text" value="{{ $comfort }}"
                                                              class="form-control" name="comfort[]"
                                                              placeholder="{{ __('admin.placeholder_text') }}">
                                                      </div>
                                                  @endif
                                              @endforeach
                                          @endif
                                      </div>
                                      <button type="button" class="btn btn-outline-primary mt-2" id="add_comfort">
                                          <i class="mdi mdi-plus"></i>
                                      </button>
                                      <script>
                                          document.getElementById('add_comfort').addEventListener('click', function() {
                                              const comforts = document.getElementById('comforts');
                                              const newPhone = document.createElement('div');
                                              newPhone.classList.add('mt-2');
                                              newPhone.innerHTML = `<input type="text" class="form-control" name="comfort[]" placeholder="{{ __('admin.placeholder_text') }}">`;
                                              comforts.appendChild(newPhone);
                                          });
                                      </script>
                                  </div>
                              </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_city') }}</label>
                                    <select class="form-select" name="city_id">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->title }}">{{ $city->title; }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_status') }}</label>
                                    <select class="form-select" name="status_id">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->title }}">{{ $status->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <div>
                                      <label for="valueInput" class="form-label">{{ __('admin.field_description') }}
                                      </label>
                                      <textarea id="editor" class="form-control" id="valueInput" name="description"
                                          placeholder="{{ __('admin.placeholder_text') }}">{{ old('description') }}</textarea>
                                  </div>
                              </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light mt-5">{{ __('admin.btn_save') }}</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.upload_script')

@endsection
