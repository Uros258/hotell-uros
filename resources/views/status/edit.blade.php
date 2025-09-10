@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Status</h1>
    <form action="{{ route('statuses.update', $status) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Status Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $status->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
