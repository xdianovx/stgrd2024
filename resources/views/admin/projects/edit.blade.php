@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_project_card_title') }} {{ $item->title }}
                    </h4>
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
        </div>

        @if (!empty($item->image))
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc text-muted">{{ __('admin.field_current_image') }}</p>
                        <div class="live-preview">
                            <div>
                                <img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.projects.update', $item->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="title" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control"
                                            id="title" name="title" placeholder="{{ __('admin.placeholder_text') }}">
                                        <input type="hidden" name="old_title" value="{{ $item->title }}">

                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="home"
                                                id="customSwitch1" {{ $item->home == '1' ? 'checked' : '' }}
                                                value="1">
                                            <label class="form-check-label"
                                                for="customSwitch1">{{ __('admin.field_home') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="image" class="form-label">{{ __('admin.field_image') }}</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="year_delivery"
                                            class="form-label">{{ __('admin.field_year_delivery') }}</label>
                                        <input type="number" value="{{ $item->year_delivery }}" class="form-control"
                                            id="year_delivery" name="year_delivery"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="link" class="form-label">{{ __('admin.field_link') }}</label>
                                        <input type="url" value="{{ $item->link }}" class="form-control"
                                            id="link" name="link" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="comfortInput" class="form-label">{{ __('admin.field_comfort') }}
                                            *</label>
                                        <input type="text" value="{{ json_decode($item->comfort)[0] }}"
                                            class="form-control" id="comfortInput" name="comfort[]"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                        <div id="comforts">
                                            @if (count(json_decode($item->comfort)) > 1)
                                                @foreach (json_decode($item->comfort) as $key => $comfort)
                                                    @if ($key > 0)
                                                        <div class="mt-2 d-flex align-items-center">
                                                            <input type="text" value="{{ $comfort }}"
                                                                class="form-control" name="comfort[]"
                                                                placeholder="{{ __('admin.placeholder_text') }}">
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-sm ms-2 remove-comfort">
                                                                <i class="mdi mdi-minus"></i>
                                                            </button>
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
                                                newPhone.classList.add('mt-2', 'd-flex', 'align-items-center');
                                                newPhone.innerHTML = `<input type="text" class="form-control" name="comfort[]" placeholder="{{ __('admin.placeholder_text') }}">
                                              <button type="button" class="btn btn-outline-danger btn-sm ms-2 remove-comfort">
                                                  <i class="mdi mdi-minus"></i>
                                              </button>`;
                                                comforts.appendChild(newPhone);
                                            });

                                            document.getElementById('comforts').addEventListener('click', function(e) {
                                                if (e.target && e.target.matches('button.remove-comfort, button.remove-comfort *')) {
                                                    e.target.closest('.mt-2').remove();
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="number_rooms"
                                            class="form-label">{{ __('admin.field_number_rooms') }}</label>
                                        <input type="number" value="{{ $item->number_rooms }}" class="form-control"
                                            id="number_rooms" name="number_rooms"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_city') }}</label>
                                    <select class="form-select" name="city_id">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->title }}"
                                                {{ $item->city_id == $city->id ? 'selected' : '' }}>{{ $city->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('admin.field_status') }}</label>
                                    <select class="form-select" name="status_id">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->title }}"
                                                {{ $item->status_id == $status->id ? 'selected' : '' }}>
                                                {{ $status->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div>
                                        <label for="descriptionInput"
                                            class="form-label">{{ __('admin.field_description') }}</label>
                                        <textarea id="editor" class="form-control" name="description" placeholder="{{ __('admin.placeholder_text') }}">{{ $item->description }}</textarea>
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
