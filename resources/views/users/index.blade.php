@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="pt-4 border-bottom pb-4">Users</h4>
        <div class="text-md-end text-start">
            <a href="{{ route('users.create') }}" class="btn btn-primary mt-2 mb-2 mt-3 mb-3">Add</a>
        </div>

        <table id="users" class="table" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isNotEmpty())
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning ms-2 mt-2">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button class="btn btn-sm btn-danger ms-2 mt-2 delete-user" data-id="{{ $user->id }}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
