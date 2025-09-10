@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statuses</h1>
    <a href="{{ route('statuses.create') }}" class="btn btn-primary mb-3">Add Status</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>
                        <a href="{{ route('statuses.edit', $status) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('statuses.destroy', $status) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
