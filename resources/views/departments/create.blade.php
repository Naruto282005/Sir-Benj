@extends('layouts.app')

@section('content')
    <h2>Add Department</h2>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection
