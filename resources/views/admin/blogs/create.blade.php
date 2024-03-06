@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('admin.new_blog_card_title')}}</h4>
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
                        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_title')}} *</label>
                                        <input type="text" value="{{ old('title') }}" class="form-control"
                                            id="valueInput" name="title" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_h1_title')}} *</label>
                                        <input type="text" value="{{ old('h1_title') }}" class="form-control input__slug"
                                            id="valueInput" name="h1_title" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>

                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{__('admin.field_slug')}} *</label>
                                        <input type="text" value="{{ old('slug') }}" class="form-control output"
                                            id="valueInput" name="slug" placeholder="{{__('admin.placeholder_text')}}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{__('admin.field_image')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{__('admin.field_video')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="video">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="valueInput" class="form-label">{{__('admin.category_blog_card_title')}} *</label>
                                    @if (!count($categories) == 0)
                                        <select type="text" data-choices class="form-control" name="category_id"
                                            id="valueInput">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->title }}"
                                                    {{ $item->id == old('category_id') ? 'selected' : '' }}>
                                                    {{ $item->title }}
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
                                        style="height: 234px;">{{ old('content') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_description')}}</label>
                                    <textarea id="basic-default-message" class="form-control ckeditor-classic" name="description" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{{ old('description') }}</textarea>
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
