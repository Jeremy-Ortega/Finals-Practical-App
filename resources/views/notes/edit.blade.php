<!-- resources/views/notes/edit.blade.php -->

@extends('layout')

@section('content')
<div class="w-full h-full main-bg">
    <header class="sticky top-0 z-50 bg-white shadow-md px-6 py-5 flex items-center justify-between">
    <a class="text-4xl font-extrabold bg-gradient-to-r from-pink-500 via-blue-500 to-yellow-500 bg-clip-text text-transparent custom-animate"
        href="{{ route('notes.index') }}" >    Re:Note౨
    </a>

</header>
    <div class="flex justify-center p-5 gap-5 flex-wrap">

        <div class="card-color flex flex-row min-w-[400px] h-auto rounded-3xl overflow-hidden " >

            <div class="flex flex-1 flex-col p-5 items-center">

                <h1 class=" text-2xl mb-2">Edit Note</h1>


                <!-- Show validation errors -->
                @if ($errors->any())
                    <div style="color: red;"                    
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 3000)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    class="fixed top-5 left-auto right-auto justify-center bg-red-100 border border-red-400 text-red-800 px-6 py-3 rounded-lg shadow-lg z-50">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form to update note -->
                <div class="w-full h-auto p-[6px] rounded-2xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 animate-gradientShift">

                    <form action="{{ route('notes.update', $note) }}" method="POST" class="bg-[aliceblue] p-3 rounded-xl">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col justify-between text-left">
                            <label>Title:</label>
                            <input type="text" name="title" value="{{ old('title', $note->title) }}"class="p-1 border-2 border-purple-500 rounded-xl 
                        focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"><br>
                        </div>

                        <div class="flex flex-col justify-between text-left">
                            <label>Content:</label>
                            <textarea name="body" rows="5" cols="40" class="p-1 border-2 border-purple-500 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"
                            >{{ old('body', $note->body) }}</textarea><br>
                        </div>

                        {{-- buttons --}}
                        <div class="flex gap-2  justify-center">
                            <button type="submit" class=" bg-blue-600 text-white font-semibold px-6 py-2 rounded-3xl 
                            shadow-2xl hover:bg-blue-700 hover:scale-105 hover:shadow-lg transition-all duration-300 
                            ease-in-out">Update</button>

                            <a href="{{ route('notes.index') }}" class=" bg-red-600 text-white font-semibold px-6 py-2 rounded-3xl 
                            shadow-2xl hover:bg-red-700 hover:scale-105 hover:shadow-lg transition-all duration-300 
                            ease-in-out">Cancel</a>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
   
@endsection
