@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('admin.new_news_card_title')}}</h4>
                    <div class="flex-shrink-0">
                      <div class="dropdown">
                          <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                              aria-expanded="false" class="">
                              <i class="ri-more-2-fill fs-14"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                              <li>
                                  <a type="button" class="dropdown-item" href="{{ route('admin.news.index') }}">
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
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="slider" id="customSwitch1" value="1">
                                            <label class="form-check-label" for="customSwitch1">{{__('admin.field_slider_question')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{__('admin.field_image')}}</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">{{__('admin.field_text_large')}}</label>
                                    <textarea class="form-control" name="description" placeholder="{{__('admin.placeholder_text')}}"
                                        style="height: 234px;">{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-message">{{__('admin.field_text_card')}}</label>
                                  <textarea class="form-control" name="cart_content" placeholder="{{__('admin.placeholder_text')}}"
                                      style="height: 234px;">{{ old('cart_content') }}</textarea>
                                </div>

                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-message">{{__('admin.field_text')}}</label>
                                  <textarea id="editor" class="form-control" name="content" placeholder="{{__('admin.placeholder_text')}}"
                                      style="height: 234px;">{{ old('content') }}</textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-5">{{__('admin.btn_save')}}</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
  @include('admin.upload_script')
@endsection
