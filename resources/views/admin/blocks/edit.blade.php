@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_block_card_title') }} {{ $item->title_left }}</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                aria-expanded="false" class="">
                                <i class="ri-more-2-fill fs-14"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                                <li>
                                    <a type="button" class="dropdown-item" href="{{ route('admin.blocks.index') }}">
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
                        <form action="{{ route('admin.blocks.update', $item) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control"
                                            id="valueInput" name="title"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title_left') }}
                                            *</label>
                                        <input type="text" value="{{ $item->title_left }}" class="form-control"
                                            id="valueInput" name="title_left"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="firstName" class="form-label">{{ __('admin.field_display') }} *</label>

                                  <div class="form-check mt-2">
                                      <input name="active" class="form-check-input" type="radio" value="FALSE"
                                          id="defaultRadio1"
                                          @if ($item->active == FALSE) checked="checked" @else @endif>
                                      <label class="form-check-label" for="defaultRadio1"> {{ __('admin.select_display_false') }} </label>
                                  </div>
                                  <div class="form-check mt-1">
                                      <input name="active" class="form-check-input" type="radio" value="TRUE"
                                          id="defaultRadio2"
                                          @if ($item->active == TRUE) checked="checked" @else @endif>
                                      <label class="form-check-label" for="defaultRadio2"> {{ __('admin.select_display_true') }} </label>
                                  </div>
                              </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('admin.field_text_large') }}</label>
                                    <textarea class="form-control" name="text_large"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->text_large !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_description') }}</label>
                                    <textarea id="editor" class="form-control" name="description"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->description !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_description_additional') }}</label>
                                    <textarea id="editor" class="form-control" name="description_additional"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->description_additional !!}</textarea>
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
