@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_news_card_title') }} {{ $item->title }}
                    </h4>
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
                        <form action="{{ route('admin.news.update', $item->slug) }}" method="POST"
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
                                        <label for="valueInput" class="form-label">{{ __('admin.field_slug') }} *</label>
                                        <input type="text" value="{{ $item->slug }}" class="form-control output"
                                            id="valueInput" name="slug"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">

                                    <div>
                                        <label for="formFile" class="form-label">{{ __('admin.field_image') }}</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                  <div class="mb-3">
                                      <label for="valueInput" class="form-label">{{__('admin.aside_title_projects')}}</label>
                                      @if (!count($projects) == 0)
                                          <select id="valueInput" class="form-control" data-choices
                                              data-choices-removeItem name="projects[]" multiple>
                                              @foreach ($projects as $project)
                                                  <option value="{{ $project->title }}"
                                                      {{ collect($item->projects)->contains('title', $project->title) ? 'selected' : '' }}>
                                                      {{ $project->title }}
                                                  </option>
                                              @endforeach
                                          </select>
                                      @else
                                          <div class="text-danger">{{__('admin.notification_no_entries_projects')}}</div>
                                      @endif
                                  </div>
                              </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_large') }}</label>
                                    <textarea id="basic-default-message" class="form-control" name="description"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->description !!}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="basic-default-message">{{ __('admin.field_text_card') }}</label>
                                    <textarea id="basic-default-message" class="form-control ckeditor-classic" name="content"
                                        placeholder="{{ __('admin.placeholder_text') }}" style="height: 234px;">{!! $item->content !!}</textarea>
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
