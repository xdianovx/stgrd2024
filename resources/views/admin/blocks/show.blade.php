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
                                        <a type="button" class="dropdown-item" href="{{ route('admin.blocks.index') }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                            {{ __('admin.btn_back') }}</a>
                                    </li>

                                    <li><a href="{{ route('admin.blocks.edit', $item) }}"
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

            @if (in_array($item->id, [1, 3]))
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_numbers') }}:</h5>

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
                                            href="{{ route('admin.blocks.number_create', $item) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col"></th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($numbers as $number)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.blocks.number_show', [$item, $number]) }}">{{ $number->title }}</a>
                                                </td>

                                                <td>{{ $number->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.blocks.number_show', [$item, $number]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.blocks.number_edit', [$item, $number]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $number->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $number->id }}"
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
                                                                action="{{ route('admin.blocks.number_destroy', [$item, $number]) }}"
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
                            @if ($numbers->links()->paginator->hasPages())
                                {{ $numbers->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif(in_array($item->id, [2, 4]))
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_advantages') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
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
                                            href="{{ route('admin.blocks.advantage_create', $item) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">{{ __('admin.field_image') }}</th>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($advantages as $advantage)
                                            <tr>
                                                <td>
                                                    @if (!empty($advantage->image))
                                                        <div class="input-group">
                                                            <img src="{{ Storage::url($advantage->image) }}"
                                                                class="rounded avatar-sm">
                                                        </div>
                                                    @else
                                                        <p>Отсутствует</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.blocks.advantage_show', [$item, $advantage]) }}">{{ $advantage->title }}</a>
                                                </td>

                                                <td>{{ $advantage->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.blocks.advantage_show', [$item, $advantage]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.blocks.advantage_edit', [$item, $advantage]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $advantage->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $advantage->id }}"
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
                                                                action="{{ route('admin.blocks.advantage_destroy', [$item, $advantage]) }}"
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
                            @if ($advantages->links()->paginator->hasPages())
                                {{ $advantages->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif(in_array($item->id, [10]))
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_reviews') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
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
                                            href="{{ route('admin.blocks.review_create', $item) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">{{ __('admin.field_photo') }}</th>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reviews as $review)
                                            <tr>
                                                <td>
                                                    @if (!empty($review->photo))
                                                        <div class="input-group">
                                                            <img src="{{ Storage::url($review->photo) }}"
                                                                class="rounded avatar-sm">
                                                        </div>
                                                    @else
                                                        <p>Отсутствует</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.blocks.review_show', [$item, $review]) }}">{{ $review->title }}</a>
                                                </td>

                                                <td>{{ $review->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.blocks.review_show', [$item, $review]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.blocks.review_edit', [$item, $review]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $review->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $review->id }}"
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
                                                                action="{{ route('admin.blocks.review_destroy', [$item, $review]) }}"
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
                            @if ($reviews->links()->paginator->hasPages())
                                {{ $reviews->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif(in_array($item->id, [7]))
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_life_stroygrad_cards') }}:</h5>

                                <div class="demo-inline-spacing">
                                    @if (session('status') === 'item-updated')
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ __('admin.alert_updated') }}
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
                                            href="{{ route('admin.blocks.life_stroygrad_card_create', $item) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 80px;">{{ __('admin.field_image') }}</th>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($life_stroygrad_cards as $life_stroygrad_card)
                                            <tr>
                                                <td>
                                                    @if (!empty($life_stroygrad_card->image))
                                                        <div class="input-group">
                                                            <img src="{{ Storage::url($life_stroygrad_card->image) }}"
                                                                class="rounded avatar-sm">
                                                        </div>
                                                    @else
                                                        <p>Отсутствует</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.blocks.life_stroygrad_card_show', [$item, $life_stroygrad_card]) }}">{{ $life_stroygrad_card->title }}</a>
                                                </td>

                                                <td>{{ $life_stroygrad_card->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.blocks.life_stroygrad_card_show', [$item, $life_stroygrad_card]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.blocks.life_stroygrad_card_edit', [$item, $life_stroygrad_card]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $life_stroygrad_card->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $life_stroygrad_card->id }}"
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
                                                                action="{{ route('admin.blocks.life_stroygrad_card_destroy', [$item, $life_stroygrad_card]) }}"
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
                            @if ($life_stroygrad_cards->links()->paginator->hasPages())
                                {{ $life_stroygrad_cards->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif(in_array($item->id, [5]))
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-4 ">{{ __('admin.aside_title_about_companies') }}:</h5>

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
                                            href="{{ route('admin.blocks.company_create', $item) }}">{{ __('admin.btn_add') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="live-preview">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">{{ __('admin.field_title') }}</th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_updated') }}
                                            </th>
                                            <th scope="col" style="width: 150px;">{{ __('admin.field_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($companies as $company)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.blocks.company_show', [$item, $company]) }}">{{ $company->title }}</a>
                                                </td>

                                                <td>{{ $company->updated_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="{{ route('admin.blocks.company_show', [$item, $company]) }}"
                                                                    class="dropdown-item"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_show') }}</a></li>
                                                            <li><a href="{{ route('admin.blocks.company_edit', [$item, $company]) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    {{ __('admin.btn_edit') }}</a></li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalScrollable{{ $company->id }}"><i
                                                                        class="bx bx-trash me-1 text-danger"
                                                                        role="button"></i>
                                                                    {{ __('admin.btn_delete') }}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalScrollable{{ $company->id }}"
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
                                                                action="{{ route('admin.blocks.company_destroy', [$item, $company]) }}"
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
                            @if ($companies->links()->paginator->hasPages())
                                {{ $companies->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
