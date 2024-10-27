@extends('layouts.admin')

@section('content')

                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">{{__('admin.field_email_address')}}</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">{{$main_info->email}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">{{__('admin.field_phone_number')}}</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">{{$main_info->phone}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">{{__('admin.field_work_time')}}</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">{{$main_info->work_time}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div>
                      <a href="{{route('admin.main_info.edit')}}" class="btn btn-primary mt-4">{{__('admin.btn_edit')}}</a>
                  </div>
                </div>

@endsection
