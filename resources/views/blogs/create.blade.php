@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Add New Blog Post</h4>
        <a href="{{ route('blogs.index') }}" class="btn btn-dark mt-2 mb-2 mt-3 mb-3">Back</a>
        <div class="mt-3">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}"
                            required data-parsley-required-message="Title is required." data-parsley-maxlength="255"
                            placeholder="Enter title">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="summernote" rows="4" required
                            data-parsley-required-message="Description is required." data-parsley-errors-container="#description-error"
                            placeholder="Enter description">{{ old('description') }}</textarea>

                        <div id="description-error" class="text-danger mt-2"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*"
                            data-parsley-filemaxmegabytes="2" data-parsley-trigger="change">
                        <small class="form-text text-muted">Max file size: 2MB</small>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
