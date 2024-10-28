@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.new_vacanci_card_title') }}</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                aria-expanded="false" class="">
                                <i class="ri-more-2-fill fs-14"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                                <li>
                                    <a type="button" class="dropdown-item" href="{{ route('admin.vacancies.index') }}">
                                        <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                        {{ __('admin.btn_back') }}</a>
                                </li>
                            </ul>
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


                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.vacancies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ old('title') }}" class="form-control"
                                            id="valueInput" name="title" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>

                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="expirienceInput" class="form-label">{{ __('admin.field_exp') }}
                                            *</label>
                                        <input type="text" value="{{ old('expirience') }}" class="form-control"
                                            id="expirienceInput" name="expirience"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="salaryInput" class="form-label">{{ __('admin.field_salary') }}
                                            *</label>
                                        <input type="text" value="{{ old('salary') }}" class="form-control"
                                            id="salaryInput" name="salary"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="cityIdInput" class="form-label">{{ __('admin.field_city') }} *</label>
                                    @if (!count($cities) == 0)
                                        <select type="text" data-choices class="form-control" name="city_id"
                                            id="cityIdInput">
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->title }}"
                                                    {{ $item->id == old('city_id') ? 'selected' : '' }}>
                                                    {{ $item->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">
                                            {{ __('admin.notification_no_entries_cities') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_duties') }}</label>
                                    <textarea id="editor" class="form-control" name="duties" placeholder="{{ __('admin.placeholder_text') }}"
                                        style="height: 234px;">{{ old('duties') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_terms') }}</label>
                                    <textarea id="editor" class="form-control" name="terms" placeholder="{{ __('admin.placeholder_text') }}"
                                        style="height: 234px;">{{ old('terms') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_reqs') }}</label>
                                    <textarea id="editor" class="form-control" name="reqs" placeholder="{{ __('admin.placeholder_text') }}"
                                        style="height: 234px;">{{ old('reqs') }}</textarea>
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
