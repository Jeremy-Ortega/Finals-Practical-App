<!-- resources/views/notes/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Edit Note</h1>

    <!-- Show validation errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to update note -->
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $note->title) }}"><br><br>

        <label>Content:</label><br>
        <textarea name="body" rows="5" cols="40">{{ old('body', $note->body) }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('notes.index') }}">Back to Notes</a>
@endsection
