<!-- resources/views/notes/create.blade.php -->

@extends('layout')

@section('content')
<body class="main-bg">
    <div class="w-full h-full">

        
    <header class="w-full sticky top-0 z-50 bg-white shadow-md px-6 py-5 flex items-center justify-between">
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-pink-500 via-blue-500 to-yellow-500 bg-clip-text text-transparent custom-animate">
        Re:Note౨
        </h1>
    </header>

        <div class="w-full h-auto flex  justify-center items-center mt-10">

            <div class="card-color flex flex-row w-[500px] h-auto rounded-3xl overflow-hidden pb-3 " >
               
                <div class="flex flex-1 flex-col p-5 items-center">
                <h1 class=" text-2xl mb-2">Create Note</h1>

                <div class="w-full h-auto p-[6px] rounded-2xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 animate-gradientShift">

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
                        
                        <form action="{{ route('notes.store') }}" class="flex flex-col w-full bg-[aliceblue] p-3 rounded-xl" method="POST">
                            @csrf
                            <div class="flex flex-col justify-between text-left">
                            <label>Title:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="p-1 border-2 border-purple-500 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"><br>
                            </div>

                            <label>Content:</label>
                            <textarea name="body" rows="5" cols="40" class="p-1 border-2 border-purple-500 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500">{{ old('body') }}</textarea><br>

                            {{-- buttons --}}
                            <div class="flex gap-2 ml-auto">

                            <button type="submit" class=" bg-blue-600 text-white font-semibold px-6 py-2 rounded-3xl 
                            shadow-2xl hover:bg-blue-700 hover:scale-105 hover:shadow-lg transition-all duration-300 
                            ease-in-out">Save</button>

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
</body>    
@endsection
