@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}!</h2>
            <p class="section-lead">
                {{ __('Change information about yourself on this page') }}.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post"
                            action="{{ route('admin.profile.update', auth()->guard('admin')->user()->id) }}"
                            class="needs-validation" enctype="multipart/form-data" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('Edit Profile') }}</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group col-12">
                                    <label>{{ __('Image') }}</label>
                                    <div id="image-preview" class="image-preview mb-3">
                                        <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                        <input type="file" name="image" id="image-upload">
                                        <input type="hidden" name="old_image" value="{{ $user->image }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('Please choose a image') }}
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>{{ __('First Name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name"
                                        required="">

                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the name') }}
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                        required="">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the email') }}
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" class="needs-validation"
                            action="{{ route('admin.profile-password.update', $user->id) }}" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('Update Pasword') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label>{{ __('Current Password') }}</label>
                                    <input type="password" class="form-control" value="" name="current_password"
                                        required="">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the old password') }}
                                    </div>
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('New Password') }}</label>
                                    <input type="password" class="form-control" value="" name="password"
                                        required="">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the new password') }}
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" value="" name="password_confirmation"
                                        required="">
                                    <div class="invalid-feedback">
                                        {{ __('Please fill in the confirm password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($user->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        })
    </script>
@endpush
