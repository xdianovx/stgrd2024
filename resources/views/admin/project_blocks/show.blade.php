@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h3 class="card-header align-items-center d-flex">{{ __('admin.block_card_title') }}:
                                {{ $item->title_left }}</h3>
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
                                        <a type="button" class="dropdown-item"
                                            href="{{ route('admin.projects.show', $project_slug) }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_back') }}</a>
                                    </li>

                                    <li><a href="{{ route('admin.projects.project_block_edit', [$project_slug, $item->slug]) }}"
                                            class="dropdown-item edit-item-btn"><i
                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_edit') }}</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($item->text_large)
                        <h5 class="text-muted">{{ __('admin.field_text_large') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->text_large !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                    @if ($item->description)
                        <h5 class="text-muted">{{ __('admin.field_description') }}:</h5>
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
                    @if ($item->description_additional)
                        <h5 class="text-muted">{{ __('admin.field_description_additional') }}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->description_additional !!}</td>
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
                    <h5 class="card-header align-items-center d-flex">{{ __('admin.block_card_info') }}</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" scope="row">Id:</th>
                                    <td class="text-muted">{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_title_left') }}:</th>
                                    <td class="text-muted">{{ $item->title_left }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_created') }}:</th>
                                    <td class="text-muted">{{ $item->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{ __('admin.field_updated') }}:</th>
                                    <td class="text-muted">{{ $item->updated_at }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div><!-- end card body -->
            </div>


            @if ($item->slug == 'information')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_planning_solutions') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-created')
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ __('admin.alert_created') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-deleted')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ __('admin.alert_deleted') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.projects.planning_solution_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">ID</th>
                                            <th scope="col" style="width: 80px;">{{ __('admin.field_plan') }}</th>
                                            <th scope="col">{{ __('admin.field_type') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($planning_solutions as $planning_solution)
                                            <tr>
                                                <td>{{ $planning_solution->id }}</td>
                                                <td>
                                                    @if (!empty($planning_solution->plan))
                                                        <div class="input-group">
                                                            <img src="{{ Storage::url($planning_solution->plan) }}"
                                                                class="rounded avatar-sm">
                                                        </div>
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.projects.planning_solution_show', [$project_slug, $item->slug, $planning_solution]) }}">{{ $planning_solution->type }}</a>
                                                </td>

                                                <td>{{ $planning_solution->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.projects.planning_solution_show', [$project_slug, $item->slug, $planning_solution]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.projects.planning_solution_edit', [$project_slug, $item->slug, $planning_solution]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $planning_solution->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $planning_solution->id }}"
                                                tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalScrollableTitle">
                                                                {{ __('admin.question_delete') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            <form
                                                                action="{{ route('admin.projects.planning_solution_destroy', [$project_slug, $item->slug, $planning_solution]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollableConfirm">{{ __('admin.btn_confirm') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td class="text-danger">{{ __('admin.notification_no_entries') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if ($planning_solutions->links()->paginator->hasPages())
                                {{ $planning_solutions->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif($item->slug == 'facilities')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_facilities') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-created')
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ __('admin.alert_created') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-deleted')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ __('admin.alert_deleted') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.projects.facilitie_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">ID</th>
                                            <th scope="col" style="width: 80px;">{{ __('admin.field_image') }}</th>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($facilities as $facilitie)
                                            <tr>
                                                <td>{{ $facilitie->id }}</td>
                                                <td>
                                                    @if (!empty($facilitie->image))
                                                        <div class="input-group">
                                                            <img src="{{ Storage::url($facilitie->image) }}"
                                                                class="rounded avatar-sm">
                                                        </div>
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.projects.facilitie_show', [$project_slug, $item->slug, $facilitie]) }}">{{ $facilitie->title }}</a>
                                                </td>

                                                <td>{{ $facilitie->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.projects.facilitie_show', [$project_slug, $item->slug, $facilitie]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.projects.facilitie_edit', [$project_slug, $item->slug, $facilitie]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $facilitie->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $facilitie->id }}"
                                                tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalScrollableTitle">
                                                                {{ __('admin.question_delete') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            <form
                                                                action="{{ route('admin.projects.facilitie_destroy', [$project_slug, $item->slug, $facilitie]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollableConfirm">{{ __('admin.btn_confirm') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td class="text-danger">{{ __('admin.notification_no_entries') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if ($facilities->links()->paginator->hasPages())
                                {{ $facilities->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif($item->slug == 'infrastructure')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_map_points') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-created')
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ __('admin.alert_created') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-deleted')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ __('admin.alert_deleted') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.projects.map_point_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">ID</th>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($map_points as $map_point)
                                            <tr>
                                                <td>{{ $map_point->id }}</td>

                                                <td>
                                                    <a
                                                        href="{{ route('admin.projects.map_point_show', [$project_slug, $item->slug, $map_point]) }}">{{ $map_point->title }}</a>
                                                </td>

                                                <td>{{ $map_point->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.projects.map_point_show', [$project_slug, $item->slug, $map_point]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.projects.map_point_edit', [$project_slug, $item->slug, $map_point]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $map_point->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $map_point->id }}"
                                                tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalScrollableTitle">
                                                                {{ __('admin.question_delete') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            <form
                                                                action="{{ route('admin.projects.map_point_destroy', [$project_slug, $item->slug, $map_point]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollableConfirm">{{ __('admin.btn_confirm') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td class="text-danger">{{ __('admin.notification_no_entries') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if ($map_points->links()->paginator->hasPages())
                                {{ $map_points->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif($item->slug == 'visualizations')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_project_images') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-created')
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ __('admin.alert_created') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status') === 'item-deleted')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ __('admin.alert_deleted') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.projects.project_image_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse ($project_images as $project_image)
                            <figure class="figure">
                                <img src="{{ Storage::url($project_image->image) }}"
                                    class="figure-img img-fluid rounded" alt="200x200" width="200"
                                    data-bs-toggle="dropdown" alt="...">


                                <div class="dropdown d-inline-block">

                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li><a href="{{ route('admin.projects.project_image_show', [$project_slug, $item->slug, $project_image]) }}"
                                                class="dropdown-item"><i
                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                {{ __('admin.btn_show') }}</a></li>
                                        <li><a href="{{ route('admin.projects.project_image_edit', [$project_slug, $item->slug, $project_image]) }}"
                                                class="dropdown-item edit-item-btn"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                {{ __('admin.btn_edit') }}</a></li>
                                        <li>
                                            <button type="submit" class="dropdown-item text-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalScrollable{{ $project_image->id }}"><i
                                                    class="bx bx-trash me-1 text-danger" role="button"></i>
                                                {{ __('admin.btn_delete') }}</button>
                                        </li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="modal fade" id="modalScrollable{{ $project_image->id }}" tabindex="-1"
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
                                            <form
                                                action="{{ route('admin.projects.project_image_destroy', [$project_slug, $item->slug, $project_image]) }}"
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
                        @empty
                            <div>
                                <p class="text-danger">{{ __('admin.notification_no_entries') }}</p>
                            </div>
                        @endforelse
                        @if ($project_images->links()->paginator->hasPages())
                            {{ $project_images->links() }}
                        @endif
                    </div>
                </div>
        </div>
    @elseif($item->slug == 'construction_progress')
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-4 ">{{ __('admin.aside_title_construction_stages') }}:</h5>

                        <div class="demo-inline-spacing">
                            @if (session('status') === 'item-updated')
                                <div class="alert alert-primary alert-dismissible" role="alert">
                                    {{ __('admin.alert_updated') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('status') === 'item-created')
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ __('admin.alert_created') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('status') === 'item-deleted')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ __('admin.alert_deleted') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item"
                                    href="{{ route('admin.projects.construction_stage_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @forelse ($construction_stages as $construction_stage)
                    <figure class="figure">
                        <img src="{{ Storage::url($construction_stage->image) }}" class="figure-img img-fluid rounded"
                            alt="200x200" width="200" data-bs-toggle="dropdown" alt="...">
                        <figcaption class="figure-caption text-end">
                            {{ __('admin.field_date') }}:{{ $construction_stage->date }}</figcaption>

                        <div class="dropdown d-inline-block">

                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                <li><a href="{{ route('admin.projects.construction_stage_show', [$project_slug, $item->slug, $construction_stage]) }}"
                                        class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                        {{ __('admin.btn_show') }}</a></li>
                                <li><a href="{{ route('admin.projects.construction_stage_edit', [$project_slug, $item->slug, $construction_stage]) }}"
                                        class="dropdown-item edit-item-btn"><i
                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                        {{ __('admin.btn_edit') }}</a></li>
                                <li>
                                    <button type="submit" class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalScrollable{{ $construction_stage->id }}"><i
                                            class="bx bx-trash me-1 text-danger" role="button"></i>
                                        {{ __('admin.btn_delete') }}</button>
                                </li>
                            </ul>
                        </div>
                    </figure>
                    <div class="modal fade" id="modalScrollable{{ $construction_stage->id }}" tabindex="-1"
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
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        {{ __('admin.btn_close') }}
                                    </button>
                                    <form
                                        action="{{ route('admin.projects.construction_stage_destroy', [$project_slug, $item->slug, $construction_stage]) }}"
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
                @empty
                    <div>
                        <p class="text-danger">{{ __('admin.notification_no_entries') }}</p>
                    </div>
                @endforelse
                @if ($construction_stages->links()->paginator->hasPages())
                    {{ $construction_stages->links() }}
                @endif
            </div>
        </div>
    </div>
@elseif($item->slug == 'documentation')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-4">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-4 ">{{ __('admin.aside_title_documents') }}:</h5>

                    <div class="demo-inline-spacing">
                        @if (session('status') === 'item-updated')
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                {{ __('admin.alert_updated') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('status') === 'item-created')
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ __('admin.alert_created') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('status') === 'item-deleted')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ __('admin.alert_deleted') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <a class="dropdown-item"
                                href="{{ route('admin.projects.document_create', [$project_slug, $item->slug]) }}">{{ __('admin.btn_add') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="live-preview">
                <div class="table-responsive table-card">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 80px;">ID</th>
                                <th scope="col">{{ __('admin.field_title') }}</th>
                                <th scope="col">{{ __('admin.field_file') }}</th>
                                <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $document)
                                <tr>
                                    <td>{{ $document->id }}</td>

                                    <td>
                                        <a
                                            href="{{ route('admin.projects.document_show', [$project_slug, $item->slug, $document]) }}">{{ $document->title }}</a>
                                    </td>
                                    <td>{{ pathinfo($document->file, PATHINFO_EXTENSION) }}</td>
                                    <td>{{ $document->updated_at->diffForHumans() }}</td>
                                    <td>

                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                <li><a href="{{ route('admin.projects.document_show', [$project_slug, $item->slug, $document]) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                        {{ __('admin.btn_show') }}</a></li>
                                                <li><a href="{{ route('admin.projects.document_edit', [$project_slug, $item->slug, $document]) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        {{ __('admin.btn_edit') }}</a></li>
                                                <li>
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalScrollable{{ $document->id }}"><i
                                                            class="bx bx-trash me-1 text-danger" role="button"></i>
                                                        {{ __('admin.btn_delete') }}</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalScrollable{{ $document->id }}" tabindex="-1"
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
                                                <form
                                                    action="{{ route('admin.projects.document_destroy', [$project_slug, $item->slug, $document]) }}"
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
                            @empty
                                <tr>
                                    <td class="text-danger">{{ __('admin.notification_no_entries') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($documents->links()->paginator->hasPages())
                    {{ $documents->links() }}
                @endif
            </div>
        </div>
    </div>
    @endif

    </div>
    </div>
@endsection
