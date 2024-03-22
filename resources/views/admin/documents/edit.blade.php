@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_document_card_title') }} {{ $item->type }}
                    </h4>
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
                        <form
                            action="{{ route('admin.projects.document_update', [$project_slug, $project_block_slug, $item]) }}"
                            method="POST" enctype="multipart/form-data">
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
                                        <label for="formFile" class="form-label">{{ __('admin.field_document') }}</label>
                                        <input class="form-control" type="file" id="formFile" name="file">
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
    @if (!empty($file_info))
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <p class="card-title-desc text-muted">{{ __('admin.field_current_document') }}</p>
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                      <div class="avatar-xs">
                          <div class="avatar-title rounded bg-secondary-subtle text-secondary">
                              <i class="ri-file-text-line fs-17"></i>
                          </div>
                      </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1 fs-15">{{$file_info['file_name'] . '.' . $file_info['file_extension']}}</h5>
                      <a download href="{{ Storage::url($item->file) }}"><p class="mb-0 fs-12 text-muted">Скачать</p></a>
                  </div>
                  <b>{{ $file_info['file_size'] }}</b>
              </div>
            </div>
        </div>
    </div>
@else
@endif
@endsection
