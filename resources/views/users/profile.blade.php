@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Update Profile</h4>
        <a href="{{ route('home') }}" class="btn btn-dark mt-2 mb-2 mt-3 mb-3">Back</a>
        <div class="mt-3">
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" data-parsley-validate>
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required
                            data-parsley-required-message="Name is required." data-parsley-maxlength="255"
                            placeholder="Enter name" value="{{ old('name', Auth::user()->name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required
                            data-parsley-required-message="Email is required." data-parsley-type="email"
                            placeholder="Enter email" value="{{ old('email', Auth::user()->email) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="old_password" class="form-label">Current Password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password"
                            data-parsley-minlength="6" placeholder="Enter your current password">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            data-parsley-minlength="6" placeholder="Enter new password (optional)">
                        <small class="form-text text-muted">Leave blank if you do not want to change the password.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            data-parsley-equalto="#password" data-parsley-equalto-message="Passwords must match"
                            placeholder="Confirm new password">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
