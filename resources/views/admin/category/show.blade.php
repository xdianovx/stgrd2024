@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h3 class="card-header align-items-center d-flex">{{__('admin.category_card_title')}}: {{ $item->title }}</h3>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                    aria-expanded="false" class="">
                                    <i class="ri-more-2-fill fs-14"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1"
                                    style="">

                                    @if ($item->parent_id == 0)
                                    <li>
                                        <a type="button" class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i> {{__('admin.btn_back')}}</a>
                                    </li>
                                    <li>
                                        <a type="button" class="dropdown-item" href="{{ route('admin.categories.create_child',$item->slug) }}">
                                            <i class="ri-share-line align-bottom me-2 text-muted"></i> {{__('admin.btn_create_subcategory')}}</a>
                                    </li>
                                    @else
                                    <li>
                                        <a type="button" class="dropdown-item" href="{{ url()->previous() }}">
                                            <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i> {{__('admin.btn_back')}}</a>
                                    </li>

                                    @endif
                                    <li><a href="{{ route('admin.categories.edit', $item->slug) }}"
                                            class="dropdown-item edit-item-btn"><i
                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{__('admin.btn_edit')}}</a></li>
                                    <li>
                                        <button type="submit" class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalScrollable{{ $item->slug }}"><i
                                                class="bx bx-trash me-1 text-danger" role="button"></i>
                                                {{__('admin.btn_delete')}}</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if (!empty($item->image))
                    <h5 class="text-muted">{{__('admin.field_image')}}:</h5>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <img src="{{ Storage::url($item->image) }}" alt="" height="200" class="rounded">
                            </div>
                        </div>
                    @else
                    @endif
                    @if ($item->description)
                        <h5 class="text-muted">{{__('admin.field_description')}}:</h5>
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
                    @if ($item->description_footer)
                        <h5 class="text-muted">{{__('admin.field_description_footer')}}:</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">{!! $item->description_footer !!}</td>
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
                    <h5 class="card-header align-items-center d-flex">{{__('admin.category_card_info')}}</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" scope="row">Id:</th>
                                    <td class="text-muted">{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{__('admin.field_title')}}:</th>
                                    <td class="text-muted">{{ $item->title }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{__('admin.field_slug')}}:</th>
                                    <td class="text-muted">{{ $item->slug }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{__('admin.field_created')}}:</th>
                                    <td class="text-muted">{{ $item->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">{{__('admin.field_updated')}}:</th>
                                    <td class="text-muted">{{ $item->updated_at }}</td>
                                </tr>

                                <div class="modal fade" id="modalScrollable{{ $item->slug }}" tabindex="-1"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">{{__('admin.question_delete')}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p
                                                    class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                    {{__('admin.notification_delete')}}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    {{__('admin.btn_close')}}
                                                </button>
                                                <form action="{{ route('admin.categories.destroy', $item->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalScrollableConfirm">{{__('admin.btn_confirm')}}</button>
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
    </div>
    @if ($child_items->count() > 0)
    <div class="card">
        <h5 class="card-header">{{__('admin.list_child_categories')}}</h5>
        <div class="card-body">
            <div class="demo-inline-spacing">
                @if (session('status') === 'item-updated')
                    <div class="alert alert-primary alert-dismissible" role="alert">
                        {{ __('admin.alert_updated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('status') === 'item-created')
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ __('admin.alert_created') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('status') === 'item-deleted')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ __('admin.alert_deleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 80px;">ID</th>
                                    <th scope="col" style="width: 80px;">{{__('admin.field_image')}}</th>
                                    <th scope="col">{{__('admin.field_title')}}</th>
                                    <th scope="col">{{__('admin.field_slug')}}</th>
                                    <th scope="col" style="width: 150px;">{{__('admin.field_updated')}}</th>
                                    <th scope="col" style="width: 150px;">{{__('admin.field_action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($child_items as $child_item)
                                    <tr>
                                        <td>{{ $child_item->id }}</td>
                                        <td>
                                            @if (!empty($child_item->image))
                                                <div class="input-group">
                                                    <img src="{{ Storage::url($child_item->image) }}"
                                                        class="rounded avatar-sm">
                                                </div>
                                            @else
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.categories.show', $child_item->slug) }}">{{ $child_item->title }}</a></td>
                                        <td>{{ $child_item->slug }}</td>
                                        <td>{{ $child_item->updated_at->diffForHumans() }}</td>
                                        <td>

                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li><a href="{{ route('admin.categories.show', $child_item->slug) }}"
                                                            class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                {{__('admin.btn_show')}}</a></li>
                                                    <li><a href="{{ route('admin.categories.edit',  [$item->slug,$child_item->slug]) }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                {{__('admin.btn_edit')}}</a></li>
                                                    <li>
                                                        <button type="submit" class="dropdown-item text-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalScrollable{{ $child_item->slug }}"><i
                                                                class="bx bx-trash me-1 text-danger" role="button"></i>
                                                                {{__('admin.btn_delete')}}</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalScrollable{{ $child_item->slug }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalScrollableTitle"> {{__('admin.question_delete')}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p
                                                        class="mt-1 text-sm text-gray-600 dark:text-gray-400  alert alert-warning text-wrap">
                                                        {{__('admin.notification_delete')}}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        {{__('admin.btn_close')}}
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.categories.destroy', $child_item->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalScrollableConfirm">{{__('admin.btn_confirm')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td class="text-danger">{{__('admin.notification_no_entries')}}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($child_items->links()->paginator->hasPages())
                        {{ $child_items->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
