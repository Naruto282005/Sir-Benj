@extends('layouts.app')

@section('content')
    <h2>Edit Department</h2>

    <form action="{{ route('departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $department->name }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description">{{ $department->description }}</textarea>
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
@endsection
