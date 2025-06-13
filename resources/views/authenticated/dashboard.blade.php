
@extends('layout')

@section('content')

<div class="w-full h-full main-bg ">

<header class="sticky top-0 z-50 bg-white shadow-md px-6 py-5 flex items-center justify-between">
    <a class="text-4xl font-extrabold bg-gradient-to-r from-pink-500 via-blue-500 to-yellow-500 bg-clip-text text-transparent custom-animate"
        href="{{ route('notes.index') }}" >    Re:Note౨
    </a>

    
   <div class="flex gap-5"> <h1 class="text-xl"> Welcome</h1> <h1 class="text-xl text-purple-700">{{auth()->user()->name}}</h1></div>
    
    <nav class="space-x-4 flex">

    <a href="{{ route('notes.create') }}"
    class="border-2  border-blue-600 inline-block bg-white font-semibold px-6 py-2 text-blue-600 rounded-2xl shadow-md hover:text-white hover:bg-blue-700 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">
    + Create Note
        </a>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button class="border-2  border-red-600 inline-block bg-white font-semibold px-6 py-2 text-red-600 rounded-2xl shadow-md hover:text-white hover:bg-red-700 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">
                    Logout
                    </button>
                </form>

    </nav>
</header>

    <!-- Show success message if available -->

@if(session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="fixed top-5 left-[90vh]  bg-green-100 border border-green-400 text-green-800 px-6 py-3 rounded-lg shadow-lg z-50"
    >
        {{ session('success') }}
    </div>
@endif

    <!-- Link to create a new note -->

    <div class="flex justify-center p-5 gap-5 flex-wrap">
    <!-- List of notes -->
    @forelse($notes as $note)

        <div class="card-color flex flex-row min-w-[400px] h-auto rounded-3xl overflow-hidden " >

            <div class="flex flex-1 flex-col p-5 items-center">

                <h3 class="font-bold text-2xl text-purple-800 mr-auto ">{{ $note->title }}</h3>

                <div class="w-full h-auto p-[3px] rounded-2xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 animate-gradientShift">
                    <p class="w-full rounded-xl bg-[aliceblue] p-3 whitespace-pre-line">{{ $note->body }}</p>
                </div>

                <!-- Edit and Delete buttons -->
                <hr>
                <div class="flex gap-2 ml-auto mt-auto">
                    
                    <a href="{{ route('notes.edit', $note) }}" 
                    class="mt-4 inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded-2xl 
                    shadow-md hover:bg-blue-700 hover:scale-105 hover:shadow-lg transition-all duration-300 
                    ease-in-out">Edit</a>

                    <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this note?')" 
                        class="mt-4 inline-block bg-red-600 text-white font-semibold px-4 py-2 rounded-2xl 
                        shadow-md hover:bg-red-700 hover:scale-105 hover:shadow-lg transition-all duration-300 
                        ease-in-out">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    @empty
    <div  class="text-white text-2xl font-semibold mt-[30vh]">
        <p>No notes yet. Create one!</p>
    </div>
    @endforelse
</div>
    @endsection
