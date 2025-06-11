<!-- resources/views/notes/create.blade.php -->

@extends('layout')

@section('content')
    <h1>Create Note</h1>

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

    <!-- Form to add note -->
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Content:</label><br>
        <textarea name="body" rows="5" cols="40">{{ old('body') }}</textarea><br><br>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('notes.index') }}">Back to Notes</a>
@endsection
