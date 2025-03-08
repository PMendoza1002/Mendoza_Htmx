@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4 bg-light">
        <div class="card-body">
            <h1 class="text-center text-primary">{{ $journal->title }}</h1>
            <p class="mt-3 text-dark">{{ $journal->content }}</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('journal.edit', $journal->id) }}" class="btn btn-warning me-2">Edit</a>
                <form action="{{ route('journal.destroy', $journal->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
