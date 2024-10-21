@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Blog Posts</h4>
        <div class="text-md-end text-start">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mt-2 mb-2 mt-3 mb-3">Add</a>
        </div>

        <table id="blogs" class="table" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th width="30%">Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $blog->user->name }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <span data-full-text="{{ htmlspecialchars($blog->description) }}">
                                    {!! Str::limit($blog->description, 200) !!}
                                </span>
                            </td>
                            <td>
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning ms-2 mt-2">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href={{ route('blogs.show', $blog->id) }} class="btn btn-sm btn-info ms-2 mt-2"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button class="btn btn-sm btn-danger ms-2 mt-2 delete-blog" data-id="{{ $blog->id }}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No blog posts available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
