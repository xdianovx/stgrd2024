@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('admin.edit_blog_card_title')}} {{ $item->title }}</h4>
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
                        <form action="{{ route('admin.blogs.update', $item->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_title')}} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control"
                                            id="valueInput" name="title" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_h1_title')}} *</label>
                                        <input type="text" value="{{ $item->h1_title }}" class="form-control input__slug"
                                            id="valueInput" name="h1_title" placeholder="{{__('admin.placeholder_text')}}">
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
                                        @if (!empty($item->image))
                                            <div class="input-group">
                                                <img src="{{ Storage::url($item->image) }}" class="img-fluid">
                                            </div>
                                        @else
                                        @endif
                                        <label for="formFile" class="form-label">{{__('admin.field_image')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">

                                    <div>
                                        @if (!empty($item->video))
                                            <div class="input-group">
                                                <img src="{{ Storage::url($item->video) }}" class="img-fluid">
                                            </div>
                                        @else
                                        @endif
                                        <label for="formFile" class="form-label">{{__('admin.field_video')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="video">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">{{__('admin.category_blog_card_title')}} *</label>
                                    @if (!count($categories) == 0)
                                        <select type="text" data-choices class="form-control" name="category_id"
                                            id="valueInput">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->title }}"
                                                    {{ $category->id == $item->category_blog->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="text-danger">
                                            {{__('admin.notification_no_entries_categories_blog')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_content')}}</label>
                                    <textarea id="basic-default-message" class="form-control" name="content" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{!! $item->content !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_description')}}</label>
                                    <textarea id="basic-default-message" class="form-control ckeditor-classic" name="description" placeholder="{{__('admin.placeholder_text')}}"
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
