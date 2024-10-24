@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.new_company_card_title') }}</h4>
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

                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.blocks.company_store', $block_slug) }}" method="POST"
                            enctype="multipart/form-data">
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
                                        <label for="valueInput" class="form-label">{{ __('admin.field_sphere_activity') }}
                                        </label>
                                        <input type="text" value="{{ old('sphere_activity') }}" class="form-control"
                                            id="valueInput" name="sphere_activity"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_site_link') }}
                                        </label>
                                        <input type="text" value="{{ old('site_url') }}" class="form-control"
                                            id="valueInput" name="site_url"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_year_foundation') }}
                                        </label>
                                        <input type="text" value="{{ old('year') }}" class="form-control"
                                            id="valueInput" name="year"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_address') }}
                                        </label>
                                        <input type="text" value="{{ old('address') }}" class="form-control"
                                            id="valueInput" name="address"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_phone') }}
                                        </label>
                                        <input type="text" value="{{ old('phone') }}" class="form-control"
                                            id="valueInput" name="phone"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                  <div>
                                      <label for="valueInput" class="form-label">{{ __('admin.field_email') }}
                                      </label>
                                      <input type="text" value="{{ old('email') }}" class="form-control"
                                          id="valueInput" name="email"
                                          placeholder="{{ __('admin.placeholder_text') }}">
                                  </div>
                              </div>
                                <div class="mb-3">
                                  <div>
                                      <label for="valueInput" class="form-label">{{ __('admin.field_description') }}
                                      </label>
                                      <textarea id="editor" class="form-control" id="valueInput" name="description"
                                          placeholder="{{ __('admin.placeholder_text') }}">{{ old('description') }}</textarea>
                                  </div>
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
