@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4 bg-light">
        <div class="card-body">
            <h1 class="text-center text-primary">Edit Journal Entry</h1>

            <form action="{{ route('journal.update', $journal->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $journal->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ $journal->content }}</textarea>
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <a href="{{ route('journal.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection