@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h3 class="card-header align-items-center d-flex">{{ __('admin.promotion_card_title') }}:
                                {{ $item->title }}</h3>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                    aria-expanded="false" class="">
                                    <i class="ri-more-2-fill fs-14"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1"
                                    style="">
                                    <li>
                                        <a type="button" class="dropdown-item" href="{{ route('admin.promotions.index') }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_back') }}</a>
                                    </li>

                                    <li><a href="{{ route('admin.promotions.edit', $item->slug) }}"
                                            class="dropdown-item edit-item-btn"><i
                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_edit') }}</a></li>
                                    <li>
                                        <button type="submit" class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalScrollable{{ $item->slug }}"><i
                                                class="bx bx-trash me-1 text-danger" role="button"></i>
                                            {{ __('admin.btn_delete') }}</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if ($item->description)
                        <h5 class="text-muted">{{ __('admin.field_text_large') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif

                    @if ($item->content)
                        <h5 class="text-muted">{{ __('admin.field_text_card') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->content !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif

                </div>
                <!--end card-body-->
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header align-items-center d-flex">{{ __('admin.promotions_card_info') }}</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" scope="row">Id:</th>
                                    <td class="text-muted">{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_title') }}:</th>
                                    <td class="text-muted">{{ $item->title }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_slug') }}:</th>
                                    <td class="text-muted">{{ $item->slug }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_created') }}:</th>
                                    <td class="text-muted">{{ $item->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_updated') }}:</th>
                                    <td class="text-muted">{{ $item->updated_at }}</td>
                                </tr>

                                <div class="modal fade" id="modalScrollable{{ $item->slug }}" tabindex="-1"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">
                                                    {{ __('admin.question_delete') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p
                                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                    {{ __('admin.notification_delete') }}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    {{ __('admin.btn_close') }}
                                                </button>
                                                <form action="{{ route('admin.promotions.destroy', $item->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalScrollableConfirm">{{ __('admin.btn_confirm') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tbody>
                        </table>

                    </div>
                </div><!-- end card body -->
                <div class="card-body">
                  <h5 class="card-title mb-4">{{__('admin.aside_title_projects')}}:</h5>
                  <div class="d-flex flex-wrap gap-2 fs-16">
                      @forelse ($item->projects as $project)
                          <a href="{{ route('admin.projects.show', $project->id) }}"
                              class="badge bg-primary-subtle text-primary">{{ $project->title }}</a>
                      @empty
                          <div class="text-danger">{{__('admin.notification_no_entries')}}</div>
                      @endforelse
                  </div>
              </div>
            </div>
        </div>
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
    </div>
@endsection
