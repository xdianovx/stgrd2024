@extends('layouts.app')

@section('content')

                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="text-center">
                                <img src="{{ asset('assets/admin/images/error429-cover.png') }}" alt="error img" class="img-fluid">
                                <div class="mt-3">
                                    <h3 class="text-uppercase">429, Too Many Requests 😭</h3>
                                    <p class="text-muted mb-4">You have sent too many requests in a given amount of time!</p>
                                    {{-- <a href="{{ route('admin.index') }}" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Back to
                                        home</a> --}}
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                 
@endsection