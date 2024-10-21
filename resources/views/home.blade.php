@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Dashboard</h4>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @if (Auth::user()->role === 'admin')
                        <div class="col-md-4">
                            <div class="card mt-4 bg-color">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2  fs-2">
                                        <i class="bi bi-people-fill me-2"></i>Users
                                    </h6>
                                    <p class="card-text  ">
                                        Total Users: <strong>{{ $users }}</strong>
                                    </p>
                                    <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-4">
                        <div class="card mt-4 bg-color">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2  fs-2"><i class="bi bi-journal-text me-2"></i> Blogs
                                </h6>
                                <p class="card-text">
                                    Total Blogs: <strong>{{ $blogs }}</strong>
                                </p>
                                <a href="{{ route('blogs.index') }}" class="btn btn-primary">View Blogs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
