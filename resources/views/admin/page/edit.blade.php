@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_page_card_title') }} {{ $item->title }}</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                            aria-expanded="false" class="">
                            <i class="ri-more-2-fill fs-14"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                            <li>
                                <a type="button" class="dropdown-item" href="{{ route('admin.pages.index') }}">
                                    <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                    {{ __('admin.btn_back') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($item->video_preview || $item->video_in_player)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-header">{{ __('admin.field__video') }}</h5>
                            @if ($item->video_preview)
                                <h6 class="text-muted mt-3">{{ __('admin.field_video_preview') }}:</h6>
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe src="{{ URL::to('/') . Storage::url($item->video_preview) }}"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($item->video_in_player)
                                <h6 class="text-muted mt-3">{{ __('admin.field_video_in_player') }}:</h6>
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ URL::to('/') . Storage::url($item->video_in_player) }}"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
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
                        <form action="{{ route('admin.pages.update', $item->slug) }}" method="POST"
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
                                @if ($item->id === 1)
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="formFile"
                                                class="form-label">{{ __('admin.field_video_preview') }}</label>
                                            <input class="form-control" type="file" id="formFile" name="video_preview">
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="formFile"
                                                class="form-label">{{ __('admin.field_video_in_player') }}</label>
                                            <input class="form-control" type="file" id="formFile"
                                                name="video_in_player">
                                        </div>
                                    </div>
                                @endif
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('admin.field_text_right') }}</label>
                                        <textarea id="editor" class="form-control" name="text_right"
                                            placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->text_right !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="basic-default-message">{{ __('admin.field_text_left') }}</label>
                                        <textarea id="editor" class="form-control" name="text_left"
                                            placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->text_left !!}</textarea>
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
