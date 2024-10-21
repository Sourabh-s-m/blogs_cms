@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Blog Post Details</h4>
        <a href="{{ route('blogs.index') }}" class="btn btn-dark mt-2 mb-2 mt-3 mb-3">Back</a>

        <div class="card mb-4">
            <div class="card-header">
                <h5>{{ $blog->title }}</h5>
                <small class="text-muted">By {{ $blog->user->name }} on {{ $blog->created_at->format('F d, Y') }}</small>
            </div>
            <div class="card-body">
                @if ($blog->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-100 vh-md-100">
                    </div>
                @else
                    <p>No image available for this blog post.</p>
                @endif
                <p class="card-text">{!! $blog->description !!}</p>

            </div>
            <div class="card-footer text-end">
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-fill"></i>
                </a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline-block"
                    onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
