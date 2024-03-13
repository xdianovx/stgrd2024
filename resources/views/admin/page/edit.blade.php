@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('admin.edit_page_card_title')}} {{ $item->title }}</h4>
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
                        <form action="{{ route('admin.pages.update', $item->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_title')}} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control input__slug"
                                            id="valueInput" name="title" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_slug')}} *</label>
                                        <input type="text" value="{{ $item->slug }}" class="form-control output"
                                            id="valueInput" name="slug" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        @if (!empty($item->video_preview))
                                   
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="http://127.0.0.1:8000{{ Storage::url($item->video_preview) }}" allowfullscreen></iframe>
                                              </div>
                                        @else
                                        @endif
                                        <label for="formFile" class="form-label">{{__('admin.field_video_preview')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="video_preview">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        @if (!empty($item->video_in_player))
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="http://127.0.0.1:8000{{ Storage::url($item->video_in_player) }}" allowfullscreen></iframe>
                                          </div>
                                        @else
                                        @endif
                                        <label for="formFile" class="form-label">{{__('admin.field_video_in_player')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="video_in_player">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_text_right')}}</label>
                                    <textarea id="basic-default-message" class="form-control" name="text_right" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{!! $item->text_right !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_text_left')}}</label>
                                    <textarea id="basic-default-message" class="form-control" name="text_left" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{!! $item->text_left !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_description')}}</label>
                                    <textarea id="basic-default-message" class="form-control" name="description" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{!! $item->description !!}</textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-5">{{__('admin.btn_save')}}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/slug_generator.js') }}"></script>

@endsection
