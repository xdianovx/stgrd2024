@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.new_project_card_title') }}</h4>
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

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ old('title') }}" class="form-control input__slug"
                                            id="valueInput" name="title" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_slug') }} *</label>
                                        <input type="text" value="{{ old('slug') }}" class="form-control output"
                                            id="valueInput" name="slug" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{ __('admin.field_image') }} *</label>
                                        <input class="form-control" type="file" id="formFile" name="poster">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_link_title') }}
                                            *</label>
                                        <input type="text" value="{{ old('link_title') }}" class="form-control output"
                                            id="valueInput" name="link_title"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_link') }} *</label>
                                        <input type="text" value="{{ old('link') }}" class="form-control output"
                                            id="valueInput" name="link"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{ __('admin.field_presentation') }}
                                            *</label>
                                        <input class="form-control" type="file" id="formFile" name="presentation">
                                    </div>
                                </div>


                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_address') }}
                                            *</label>
                                        <input type="text" value="{{ old('address') }}" class="form-control output"
                                            id="valueInput" name="address"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_flats') }} *</label>
                                        <input type="text" value="{{ old('flats') }}" class="form-control output"
                                            id="valueInput" name="flats"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_deadline') }}
                                            *</label>
                                        <input type="text" value="{{ old('deadline') }}" class="form-control output"
                                            id="valueInput" name="deadline"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_interior') }}
                                            *</label>
                                        <input type="text" value="{{ old('interior') }}" class="form-control output"
                                            id="valueInput" name="interior"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_floors') }}
                                            *</label>
                                        <input type="text" value="{{ old('floors') }}" class="form-control output"
                                            id="valueInput" name="floors"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_corpuses') }}
                                            *</label>
                                        <input type="text" value="{{ old('corpuses') }}" class="form-control output"
                                            id="valueInput" name="corpuses"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                  <label for="valueInput" class="form-label">{{ __('admin.field_city') }} *</label>
                                  @if (!count($cities) == 0)
                                      <select type="text" data-choices class="form-control" name="city_id"
                                          id="valueInput">
                                          @foreach ($cities as $item)
                                              <option value="{{ $item->title }}"
                                                  {{ $item->id == old('city_id') ? 'selected' : '' }}>
                                                  {{ $item->title }}
                                              </option>
                                          @endforeach
                                      </select>
                                  @else
                                      <div class="text-danger">{{ __('admin.notification_no_entries_cities') }}</div>
                                  @endif
                              </div>

                              <div class="col-xxl-6 col-md-6">
                                <label for="valueInput" class="form-label">{{ __('admin.field_status') }} *</label>
                                @if (!count($statuses) == 0)
                                    <select type="text" data-choices class="form-control" name="status_id"
                                        id="valueInput">
                                        @foreach ($statuses as $item)
                                            <option value="{{ $item->title }}"
                                                {{ $item->id == old('status_id') ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <div class="text-danger">{{ __('admin.notification_no_entries_statuses') }}</div>
                                @endif
                            </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_about') }} *</label>
                                    <textarea id="basic-default-message" class="form-control" name="text"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{{ old('text') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_card') }} *</label>
                                    <textarea id="basic-default-message" class="form-control" name="text_card"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{{ old('text_card') }}</textarea>
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

    <script src="{{ asset('assets/admin/js/slug_generator.js') }}"></script>

@endsection
