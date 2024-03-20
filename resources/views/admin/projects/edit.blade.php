@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_city_card_title') }} {{ $item->title }}</h4>
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

        @if (!empty($item->poster))
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc text-muted">{{ __('admin.field_current_image') }}</p>
                        <div class="live-preview">
                            <div>
                                <img src="{{ Storage::url($item->poster) }}" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif

        @if (!empty($item->presentation))
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc text-muted">{{ __('admin.field_current_presentation') }}</p>
                        <div class="live-preview">
                            <div>
                                <embed src="{{ Storage::url($item->presentation) }}" frameborder="0" width="100%"
                                    height="400px">
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
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control input__slug"
                                            id="valueInput" name="title"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_slug') }} *</label>
                                        <input type="text" value="{{ $item->slug }}" class="form-control output"
                                            id="valueInput" name="slug"
                                            placeholder="{{ __('admin.placeholder_text') }}">
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
                                        <input type="text" value="{{ $item->link_title }}" class="form-control output"
                                            id="valueInput" name="link_title"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_link') }} *</label>
                                        <input type="text" value="{{ $item->link }}" class="form-control output"
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
                                        <input type="text" value="{{ $item->address }}" class="form-control output"
                                            id="valueInput" name="address"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_flats') }} *</label>
                                        <input type="text" value="{{ $item->flats }}" class="form-control output"
                                            id="valueInput" name="flats"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_deadline') }}
                                            *</label>
                                        <input type="text" value="{{ $item->deadline }}" class="form-control output"
                                            id="valueInput" name="deadline"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_interior') }}
                                            *</label>
                                        <input type="text" value="{{ $item->interior }}" class="form-control output"
                                            id="valueInput" name="interior"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_floors') }}
                                            *</label>
                                        <input type="text" value="{{ $item->floors }}" class="form-control output"
                                            id="valueInput" name="floors"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_corpuses') }}
                                            *</label>
                                        <input type="text" value="{{ $item->corpuses }}" class="form-control output"
                                            id="valueInput" name="corpuses"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>



                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">{{ __('admin.city_card_title') }}
                                        *</label>
                                    @if (!count($cities) == 0)
                                        <select type="text" data-choices class="form-control" name="city_id"
                                            id="valueInput">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->title }}"
                                                    {{ $city->id == $item->city->id ? 'selected' : '' }}>
                                                    {{ $city->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">
                                            {{ __('admin.notification_no_entries_cities') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">{{ __('admin.status_card_title') }}
                                        *</label>
                                    @if (!count($statuses) == 0)
                                        <select type="text" data-choices class="form-control" name="status_id"
                                            id="valueInput">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->title }}"
                                                    {{ $status->id == $item->status->id ? 'selected' : '' }}>
                                                    {{ $status->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">
                                            {{ __('admin.notification_no_entries_statuses') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_about') }} *</label>
                                    <textarea id="basic-default-message" class="form-control" name="text"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{{ $item->text }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_card') }} *</label>
                                    <textarea id="basic-default-message" class="form-control" name="text_card"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{{ $item->text_card }}</textarea>
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
