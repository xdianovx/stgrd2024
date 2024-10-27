@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.edit_planning_solution_card_title') }} {{ $item->type }}
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
                        <form action="{{ route('admin.projects.planning_solution_update', [$project_slug, $item]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_number_rooms') }} *</label>
                                        <input type="text" value="{{ $item->number_rooms }}" class="form-control"
                                            id="valueInput" name="number_rooms" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_number_square_meters') }}
                                            *</label>
                                        <input type="text" value="{{ $item->number_square_meters }}" class="form-control"
                                            id="valueInput" name="number_square_meters" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_price') }}
                                            *</label>
                                        <input type="text" value="{{ $item->price }}" class="form-control"
                                            id="valueInput" name="price"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                                {{-- <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">{{ __('admin.field_plan') }}</label>
                                        <input class="form-control" type="file" id="formFile" name="plan">
                                    </div>
                                </div> --}}
                            </div>
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light mt-5">{{ __('admin.btn_save') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- @if (!empty($item->plan))
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-body">
                <p class="card-title-desc text-muted">{{ __('admin.field_current_plan') }}</p>
                <div class="live-preview">
                    <div>
                        <img src="{{ Storage::url($item->plan) }}" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@endif --}}

@endsection
