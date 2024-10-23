@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_life_stroygrad_card_card_title') }} {{ $item->title }}
                    </h4>
                    <div class="flex-shrink-0">
                      <div class="dropdown">
                          <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                              aria-expanded="false" class="">
                              <i class="ri-more-2-fill fs-14"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                              <li>
                                  <a type="button" class="dropdown-item" href="{{ route('admin.blocks.show', $block_slug) }}">
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

                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.blocks.life_stroygrad_card_update', [$block_slug, $item]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ $item->title }}" class="form-control"
                                            id="valueInput" name="title" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{ __('admin.field_image') }}</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_description') }}</label>
                                    <textarea id="basic-default-message" class="form-control" name="description"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{{ $item->description }}</textarea>
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


@endsection
