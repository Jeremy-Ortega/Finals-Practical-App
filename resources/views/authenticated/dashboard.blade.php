{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <head> {{auth::user()->name}}</head>
    <h1>hello dashboard</h1>
</body>
</html> --}}


<!-- resources/views/notes/index.blade.php -->

@extends('layout')

@section('content')
    <h1>Your Notes</h1>

    <!-- Show success message if available -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Link to create a new note -->
    <a href="{{ route('notes.create') }}">+ Create Note</a>

    <hr>

    <!-- List of notes -->
    @forelse($notes as $note)
        <div style="margin-bottom: 20px;">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->body }}</p>

            <!-- Edit and Delete buttons -->
            <a href="{{ route('notes.edit', $note) }}">Edit</a>

            <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this note?')">Delete</button>
            </form>
        </div>
    @empty
        <p>No notes yet. Create one!</p>
    @endforelse
@endsection
