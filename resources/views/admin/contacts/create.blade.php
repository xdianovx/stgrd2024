@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ __('admin.new_contact_card_title') }}</h4>
                    <div class="flex-shrink-0">
                      <div class="dropdown">
                          <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                              aria-expanded="false" class="">
                              <i class="ri-more-2-fill fs-14"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" style="">
                              <li>
                                  <a type="button" class="dropdown-item" href="{{ route('admin.contacts.index') }}">
                                      <i class="ri-arrow-left-line align-bottom me-2 text-muted"></i>
                                      {{ __('admin.btn_back') }}</a>
                              </li>
                          </ul>
                      </div>
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


                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="valueInput" class="form-label">{{ __('admin.field_title') }} *</label>
                                        <input type="text" value="{{ old('title') }}" class="form-control"
                                            id="valueInput" name="title" placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>

                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="addressInput" class="form-label">{{ __('admin.field_address') }} *</label>
                                        <input type="text" value="{{ old('address') }}" class="form-control"
                                            id="addressInput" name="address"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="phoneInput" class="form-label">{{ __('admin.field_phone') }} *</label>
                                        <input type="text" value="{{ old('phone.0') }}" class="form-control"
                                            id="phoneInput" name="phone[]" placeholder="{{ __('admin.placeholder_text') }}">
                                        <div id="phones">
                                            @if (old('phone'))
                                                @foreach (old('phone') as $key => $phone)
                                                    @if ($key > 0)
                                                        <div class="mt-2">
                                                            <input type="text" value="{{ $phone }}"
                                                                class="form-control" name="phone[]"
                                                                placeholder="{{ __('admin.placeholder_text') }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" class="btn btn-outline-primary mt-2" id="add_phone">
                                            <i class="mdi mdi-plus"></i>
                                        </button>
                                        <script>
                                            document.getElementById('add_phone').addEventListener('click', function() {
                                                const phones = document.getElementById('phones');
                                                const newPhone = document.createElement('div');
                                                newPhone.classList.add('mt-2');
                                                newPhone.innerHTML = `<input type="text" class="form-control" name="phone[]" placeholder="{{ __('admin.placeholder_text') }}">`;
                                                phones.appendChild(newPhone);
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="longitudeInput" class="form-label">{{ __('admin.field_longitude') }}
                                            *</label>
                                        <input type="text" value="{{ old('longitude') }}" class="form-control"
                                            id="longitudeInput" name="longitude"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="latitudeInput" class="form-label">{{ __('admin.field_latitude') }}
                                            *</label>
                                        <input type="text" value="{{ old('latitude') }}" class="form-control"
                                            id="latitudeInput" name="latitude"
                                            placeholder="{{ __('admin.placeholder_text') }}">
                                    </div>
                                </div>

                              <div class="col-xxl-6 col-md-6">
                                <label for="cityIdInput" class="form-label">{{ __('admin.field_city') }} *</label>
                                @if (!count($cities) == 0)
                                    <select type="text" data-choices class="form-control" name="city_id"
                                        id="cityIdInput">
                                        @foreach ($cities as $item)
                                            <option value="{{ $item->title }}"
                                                {{ $item->id == old('city_id') ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <div class="text-danger">
                                        {{ __('admin.notification_no_entries_cities') }}
                                    </div>
                                @endif
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

@endsection
