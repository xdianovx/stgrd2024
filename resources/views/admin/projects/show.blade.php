@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h3 class="card-header align-items-center d-flex">{{ __('admin.project_card_title') }}:
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
                                        <a type="button" class="dropdown-item" href="{{ url()->previous() }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_back') }}</a>
                                    </li>

                                    <li><a href="{{ route('admin.projects.edit', $item->slug) }}"
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
                    @if ($item->text)
                        <h5 class="text-muted">{{ __('admin.field_text_about') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->text !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                    @if ($item->text_card)
                        <h5 class="text-muted">{{ __('admin.field_text_card') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->text_card !!}</td>
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
                    <h5 class="card-header align-items-center d-flex">{{ __('admin.project_card_info') }}</h5>
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
                                    <th class="ps-0" scope="row">{{ __('admin.field_link_title') }}:</th>
                                    <td class="text-muted">{{ $item->link_title }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_link') }}:</th>
                                    <td class="text-muted">{{ $item->link }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_address') }}:</th>
                                    <td class="text-muted">{{ $item->address }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_flats') }}:</th>
                                    <td class="text-muted">{{ $item->flats }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_deadline') }}:</th>
                                    <td class="text-muted">{{ $item->deadline }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_interior') }}:</th>
                                    <td class="text-muted">{{ $item->interior }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_floors') }}:</th>
                                    <td class="text-muted">{{ $item->floors }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_corpuses') }}:</th>
                                    <td class="text-muted">{{ $item->corpuses }}</td>
                                </tr>

                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_city') }}:</th>
                                    <td class="text-muted">{{ $item->city->title }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_status') }}:</th>
                                    <td class="text-muted">{{ $item->status->title }}</td>
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
                                                <form action="{{ route('admin.projects.destroy', $item->slug) }}"
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
            </div>
        </div>
        @if (!empty($item->poster))
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc text-muted">{{ __('admin.field_current_image') }}</p>
                        <div class="live-preview">
                            <div>
                                <img src="{{ Storage::url($item->poster) }}" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif

        @if (!empty($item->presentation))
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc text-muted">{{ __('admin.field_current_presentation') }}</p>
                        <div class="live-preview">
                            <div>
                                <embed src="{{ Storage::url($item->presentation) }}" frameborder="0" width="100%"
                                    height="400px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>



    <div class="card">
        <div class="card-body">
            <div class="row">
                <h5 class="card-header align-items-center d-flex">{{ __('admin.aside_title_blocks') }}
                </h5>
                <div class="demo-inline-spacing">
                  @if (session('status') === 'item-updated')
                      <div class="alert alert-primary alert-dismissible" role="alert">
                          {{ __('Updated successfully.') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                              aria-label="Close"></button>
                      </div>
                  @endif
                  @if (session('status') === 'item-created')
                      <div class="alert alert-success alert-dismissible" role="alert">
                          {{ __('Created successfully.') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                              aria-label="Close"></button>
                      </div>
                  @endif
                  @if (session('status') === 'item-deleted')
                      <div class="alert alert-danger alert-dismissible" role="alert">
                          {{ __('Deleted successfully.') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                              aria-label="Close"></button>
                      </div>
                  @endif
              </div>
                @forelse ($item->blocks as $block)
                    <div class="col-xxl-3 col-sm-6">

                        <div
                            class="card profile-project-card shadow-none profile-project-@if ($block->active == true) success @elseif($block->active == false)warning @endif">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                        <h5 class="fs-15 text-truncate"><a href="#"
                                                class="text-body">{{ $block->title_left }}</a>
                                        </h5>
                                        <p class="text-muted text-truncate mb-0">{{ __('admin.field_updated') }}
                                            : <span
                                                class="fw-semibold text-body">{{ $block->updated_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">


                                        @if ($block->active == true)
                                            <div class="badge bg-success-subtle text-success fs-11" role="alert">
                                                <i class="ri-check-double-line label-icon"></i>
                                                <strong>{{ __('admin.select_display_true') }}</strong>
                                            </div>
                                        @else
                                            <div
                                                class="badge bg-warning-subtle text-warning fs-11
                                    role="alert">
                                                <i class="ri-alert-line label-icon"></i>
                                                <strong>{{ __('admin.select_display_false') }}</strong>
                                            </div>
                                        @endif
                                    </div>



                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink1"
                                                data-bs-toggle="dropdown" aria-expanded="false" class="">
                                                <i class="ri-more-2-fill fs-14"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuLink1" style="">

                                                <li><a href="{{ route('admin.blocks.edit', $block->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        {{ __('admin.btn_edit') }}</a>
                                                </li>
                                                <li><a href="{{ route('admin.blocks.show', $block->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                        {{ __('admin.btn_show') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                @empty
                    <div class="text-danger">{{ __('admin.notification_no_entries') }}</div>
                @endforelse
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-body-->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1 text-decoration-underline">{{ __('admin.aside_title_news_project') }}</h5>
            </div>
            @forelse ($item->news as $new)
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('admin.news.show', $new->slug) }}">
                                            <h3 class="card-title mb-2">{{ $new->title }}</h3>
                                        </a>
                                        <h5 class="card-text text-muted mb-0">{!! Illuminate\Support\Str::limit($new->description, 200) !!}</h5>
                                        <br>
                                        <p class="card-text text-muted mb-0">{!! Illuminate\Support\Str::limit($new->content, 200) !!}</p>
                                        </br>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text"><small
                                                class="text-muted">{{ __('admin.field_updated') }}:{{ $new->updated_at }}</small>
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($new->image))
                                    <div class="col-md-4">
                                        <img class="rounded-end img-fluid h-100 object-fit-cover"
                                            src="{{ Storage::url($new->image) }}" alt="Card image">
                                    </div>
                                @else
                                @endif
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
            @empty
                <div class="text-danger">{{ __('admin.notification_no_entries') }}</div>
            @endforelse
        </div><!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1 text-decoration-underline">{{ __('admin.aside_title_promotions_project') }}</h5>
            </div>
            @forelse ($item->promotions as $promotion)
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('admin.promotions.show', $promotion->slug) }}">
                                            <h3 class="card-title mb-2">{{ $promotion->title }}</h3>
                                        </a>
                                        <h5 class="card-text text-muted mb-0">{!! Illuminate\Support\Str::limit($promotion->description, 200) !!}</h5>
                                        <br>
                                        <p class="card-text text-muted mb-0">{!! Illuminate\Support\Str::limit($promotion->content, 200) !!}</p>
                                        </br>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text"><small
                                                class="text-muted">{{ __('admin.field_updated') }}:{{ $promotion->updated_at }}</small>
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($promotion->image))
                                    <div class="col-md-4">
                                        <img class="rounded-end img-fluid h-100 object-fit-cover"
                                            src="{{ Storage::url($promotion->image) }}" alt="Card image">
                                    </div>
                                @else
                                @endif
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
            @empty
                <div class="text-danger">{{ __('admin.notification_no_entries') }}</div>
            @endforelse
        </div><!-- end col -->
    </div>
@endsection
